<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141210100945 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE t_dossier (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, sous_titre VARCHAR(100) DEFAULT NULL, contenu VARCHAR(1000) NOT NULL, url_image VARCHAR(200) DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, tarif NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE t_paragraphe (id INT AUTO_INCREMENT NOT NULL, dossier_id INT NOT NULL, image_id INT DEFAULT NULL, titre VARCHAR(100) NOT NULL, sous_titre VARCHAR(100) DEFAULT NULL, contenu VARCHAR(1000) NOT NULL, ordre INT NOT NULL, INDEX IDX_184E94C6611C0C56 (dossier_id), UNIQUE INDEX UNIQ_184E94C63DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE t_image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, url VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE t_paragraphe ADD CONSTRAINT FK_184E94C6611C0C56 FOREIGN KEY (dossier_id) REFERENCES t_dossier (id)');
        $this->addSql('ALTER TABLE t_paragraphe ADD CONSTRAINT FK_184E94C63DA5256D FOREIGN KEY (image_id) REFERENCES t_image (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE t_paragraphe DROP FOREIGN KEY FK_184E94C6611C0C56');
        $this->addSql('ALTER TABLE t_paragraphe DROP FOREIGN KEY FK_184E94C63DA5256D');
        $this->addSql('DROP TABLE t_dossier');
        $this->addSql('DROP TABLE t_paragraphe');
        $this->addSql('DROP TABLE t_image');
    }
}

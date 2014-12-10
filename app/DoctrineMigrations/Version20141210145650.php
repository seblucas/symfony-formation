<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141210145650 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE t_paragraphe DROP FOREIGN KEY FK_184E94C6611C0C56');
        $this->addSql('ALTER TABLE t_paragraphe ADD CONSTRAINT FK_184E94C6611C0C56 FOREIGN KEY (dossier_id) REFERENCES t_dossier (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE t_paragraphe DROP FOREIGN KEY FK_184E94C6611C0C56');
        $this->addSql('ALTER TABLE t_paragraphe ADD CONSTRAINT FK_184E94C6611C0C56 FOREIGN KEY (dossier_id) REFERENCES t_dossier (id)');
    }
}

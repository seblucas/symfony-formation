<?php

namespace QD\SuperBundle\Command;

use QD\SuperBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of DossierImportCommand
 * http://symfony.com/doc/current/cookbook/console/console_command.html
 * @author formation
 */
class DossierImportCommand extends ContainerAwareCommand {
    protected function configure()
    {
        $this
            ->setName('qd:image:import')
            ->setDescription('Import de fichier csv')
            ->addArgument('file', InputArgument::REQUIRED, 'Faut un fichier banane')
        ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('file');
        if (!is_readable($name)) {
            $output->writeln("<error>Ton fichier il existe même pas</error>");
            return 1;
        }
        $content = file_get_contents($name);
        
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        
        foreach (explode("\n", $content) as $value) {
            if (empty ($value)) continue;
            $output->writeln("Ligne");
            $output->writeln($value);
            $image = new Image();
            $result = explode(";", $value);
            $image->setNom($result[0]);
            $image->setUrl($result[1]);
            $em->persist($image);
        }
        $em->flush();
    }
}

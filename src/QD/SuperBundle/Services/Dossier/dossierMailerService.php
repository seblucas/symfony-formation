<?php

namespace QD\SuperBundle\Services\Dossier;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

/**
 * Description of dossierMailerService
 *
 * @author formation
 */
class dossierMailerService {
    /**
     *
     * @var \Swift_Mailer
     */
    private $swiftMailer;
    
    /**
     *
     * @var EngineInterface;
     */
    private $engine;
        
    public function __construct(\Swift_Mailer $swiftMailer, EngineInterface $engine) {
        $this->swiftMailer = $swiftMailer;
        $this->engine = $engine;
    }
    
    
    public function envoiDossier($dossier) {
        $message = \Swift_Message::newInstance()
        ->setSubject("Envoi dossier {$dossier->getId()}")
        ->setFrom('send@example.com')
        ->setTo('sebastien.lucas@gmail.com')
        ->setBody($this->engine->render('QDSuperBundle:Dossier:mail.html.twig', array('dossier' => $dossier)));
        $this->swiftMailer->send($message);
    }
}

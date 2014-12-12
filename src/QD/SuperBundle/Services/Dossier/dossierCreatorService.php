<?php

namespace QD\SuperBundle\Services\Dossier;

use Doctrine\ORM\EntityManagerInterface;
use QD\SuperBundle\Form\Type\DossierType;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;

/**
 * Description of dossierCreatorService
 *
 * @author formation
 */
class dossierCreatorService {
    /**
     *
     * @var RequestStack
     */
    private $requestStack;
    /**
     *
     * @var EngineInterface
     */
    private $engine;
    /**
     *
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     *
     * @var EntityManagerInterface
     */
    private $em;
    /**
     *
     * @var RouterInterface
     */
    private $router;
    
    public function __construct(RequestStack $requestStack, 
            FormFactoryInterface $formFactory, 
            EngineInterface $engine,
            EntityManagerInterface $em,
            RouterInterface $router) {
        $this->formFactory = $formFactory;
        $this->requestStack = $requestStack;
        $this->engine = $engine;
        $this->em = $em;
        $this->router = $router;
    }
    
    
    public function createDossier() {
        $form = $this->formFactory->create(new DossierType ());
        $form->handleRequest($this->requestStack->getCurrentRequest());
        $dossier = 1;
        $idiot = 2;
        if ($form->isValid()) {
            $idiot = $form->get('idiot')->getData();
            $dossier = $form->getData();
            $this->em->persist($dossier);
            $this->em->flush();
            return new RedirectResponse($this->router->generate("action.liste"));
        }
        return $this->engine->renderResponse("QDSuperBundle:Dossier:new.html.twig", 
                array('form' => $form->createView(), 'data' => $dossier, "idiot" => $idiot));
    }
}

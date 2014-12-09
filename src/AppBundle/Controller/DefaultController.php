<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig', array('pram'));
    }
    
    /**
     * @Route("/toot", name="toot")
     */
    public function tootAction()
    {
        return $this->render('AppBundle::toot.html.twig');
    }
}

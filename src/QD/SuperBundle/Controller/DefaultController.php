<?php

namespace QD\SuperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/action")
 * 
 */
class DefaultController extends Controller
{
    /**
     * @Route("/bonjour/{name}.{_format}", defaults={"name" = "Inconnu"})
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name, Request $request)
    {
        return array(
            'name' => $name, 
            'method' => $request->getMethod()
                );
    }
    
    /**
     * @Route("/bye/{name}", name="bye")
     * @Template()
     */
    public function byeAction($name)
    {
        return array('name' => $name);
    }
}

<?php

namespace QD\SuperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/booo")
 * 
 */
class BoooController extends Controller
{
    /**
     * @Route("")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        return array(
            'method' => $request->getMethod()
                );
    }
    
    /**
     * @Route("/{name}")
     * @Template()
     */
    public function nameAction($name, Request $request)
    {
        return array(
            'name' => $name,
            'method' => $request->getMethod()
                );
    }
    
}

<?php

namespace QD\SuperBundle\Controller;

use QD\SuperBundle\Entity\Dossier;
use QD\SuperBundle\Form\Type\DossierType;
use QD\SuperBundle\Repository\DossierRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of DossierController
 *
 * @author formation
 * @Route("/dossier")
 */
class DossierController extends Controller {
    /**
     * @Route("/{id}", requirements={"id": "\d+"})
     * @Template()
     */
    public function detailAction($id)
    {
        /* @var $dossierRepository DossierRepository */
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        $dossier = $dossierRepository->findWithDeps($id);
        if (!$dossier) {
            throw $this->createNotFoundException("Le dossier spécifié ({$id}) n'existe pas");
        }
        return array("id" => $id, "dossier" => $dossier);
    }
    
    /**
     * @Route("", name="action.liste")
     * @Template()
     */
    public function listeAction()
    {
        /* @var $dossierRepository DossierRepository */
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        $liste = $dossierRepository->findAllWithCount();

        return array("liste" => $liste);
    }
    
    /**
     * @Route("/new", name="action.new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(new DossierType ());
        $form->handleRequest($request);
        $dossier = 1;
        $idiot = 2;
        if ($form->isValid()) {
            $idiot = $form->get('idiot')->getData();
            $em = $this->getDoctrine()->getManager();
            $dossier = $form->getData();
            $em->persist($dossier);
            $em->flush();
            //return $this->redirect($this->generateUrl("action.liste"));
        }
        
        return array('form' => $form->createView(), 'data' => $dossier, "idiot" => $idiot);
    }
    
    /**
     * @Route("/{id}/edit", requirements={"id": "\d+"}, name="action.edit")
     * @Template("QDSuperBundle:Dossier:new.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        /* @var $dossierRepository DossierRepository */
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        /* @var $dossier Dossier */
        $dossier = $dossierRepository->findWithDeps($id);
        
        $form = $this->createForm(new DossierType (), $dossier);
        $form->handleRequest($request);
        $dossier = 1;
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $dossier = $form->getData();
            //$em->persist($dossier);
            $em->flush();
            //return $this->redirect($this->generateUrl("action.liste"));
        }
        
        return array('form' => $form->createView(), 'data' => $dossier);
    }
    
    /**
     * @Route("/new")
     * @Template("QDSuperBundle:")
     * @Method({"POST"})
     */
//    public function addNewAction()
//    {
//        $form = $this->createForm(new DossierType ());
//        
//        return array('form' => $form->createView());
//    }

    
    /**
     * @Route("/{id}/delete", requirements={"id": "\d+"}, name="action.delete")
     */
    public function deleteAction($id)
    {
        /* @var $dossierRepository DossierRepository */
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        if ($dossierRepository->deleteById($id) !== 1) {
            throw $this->createNotFoundException("Le dossier spécifié ({$id}) n'existe pas");
        }
        return $this->redirect($this->generateUrl("action.liste"));
    }
    
    /**
     * @Route("/{id}/increment", requirements={"id": "\d+"}, name="action.incremente")
     */
    public function incrementeAction($id)
    {
        /* @var $dossierRepository DossierRepository */
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        /* @var $dossier Dossier */
        $dossier = $dossierRepository->findWithDeps($id);
        if (!$dossier) {
            throw $this->createNotFoundException("Le dossier spécifié ({$id}) n'existe pas");
        }
        foreach ($dossier->getParagraphes() as $paragraphe) {
            $paragraphe->setOrdre($paragraphe->getOrdre() + 1);
        }
        $this->getDoctrine()->getManager()->flush();
        return $this->redirect($this->generateUrl("action.liste"));
    }
    
    /**
     * @Route("/{id}/clone", requirements={"id": "\d+"}, name="action.clone")
     */
    public function cloneAction($id)
    {
        /* @var $dossierRepository DossierRepository */
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        /* @var $dossier Dossier */
        $dossier = $dossierRepository->findWithDeps($id);
        if (!$dossier) {
            throw $this->createNotFoundException("Le dossier spécifié ({$id}) n'existe pas");
        }
        $em = $this->getDoctrine()->getManager();
        $dossier2 = clone $dossier;
        $em->persist($dossier2);
        $em->flush();
        return $this->redirect($this->generateUrl("action.liste"));
    }
}

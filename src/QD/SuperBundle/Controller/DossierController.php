<?php

namespace QD\SuperBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        /* @var $dossierRepository \QD\SuperBundle\Repository\DossierRepository */
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
        /* @var $dossierRepository \QD\SuperBundle\Repository\DossierRepository */
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        $liste = $dossierRepository->findAllWithCount();

        return array("liste" => $liste);
    }
    
    /**
     * @Route("/{id}/delete", requirements={"id": "\d+"}, name="action.delete")
     */
    public function deleteAction($id)
    {
        /* @var $dossierRepository \QD\SuperBundle\Repository\DossierRepository */
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        if ($dossierRepository->deleteById($id) !== 1) {
            throw $this->createNotFoundException("Le dossier spécifié ({$id}) n'existe pas");
        }
        return $this->redirect($this->generateUrl("action.liste"));
    }
}

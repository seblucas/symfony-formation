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
        $dossierRepository = $this->getDoctrine()->getRepository("QDSuperBundle:Dossier");
        $dossier = $dossierRepository->find($id);
        if (!$dossier) {
            throw $this->createNotFoundException("Le dossier spécifié ({$id}) n'existe pas");
        }
        return array("id" => $id, "dossier" => $dossier);
    }
}

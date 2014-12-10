<?php

namespace QD\SuperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Description of Dossier
 *
 * @author formation
 * @ORM\Entity(repositoryClass="QD\SuperBundle\Repository\DossierRepository")
 * @ORM\Table(name="t_dossier")
 */
class Dossier {
    //put your code here
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $titre;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $sousTitre;
    /**
     * @ORM\Column(type="string", length=1000)
     */
    protected $contenu;
    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $urlImage;
    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    protected $dateDebut;
    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    protected $dateFin;
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $tarif;
    /**
     * @ORM\OneToMany(targetEntity="Paragraphe", mappedBy="dossier")
     * @var ArrayCollection
     */
    protected $paragraphes;
    
    public function __construct() {
        $this->paragraphes = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getSousTitre() {
        return $this->sousTitre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getUrlImage() {
        return $this->urlImage;
    }

    public function getDateDebut() {
        return $this->dateDebut;
    }

    public function getDateFin() {
        return $this->dateFin;
    }

    public function getTarif() {
        return $this->tarif;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setSousTitre($sousTitre) {
        $this->sousTitre = $sousTitre;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function setUrlImage($urlImage) {
        $this->urlImage = $urlImage;
    }

    public function setDateDebut(\DateTime $dateDebut) {
        $this->dateDebut = $dateDebut;
    }

    public function setDateFin(\DateTime $dateFin) {
        $this->dateFin = $dateFin;
    }

    public function setTarif($tarif) {
        $this->tarif = $tarif;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getParagraphes() {
        return $this->paragraphes;
    }

    public function setParagraphes(ArrayCollection $paragraphes) {
        $this->paragraphes->clear();
        foreach ($paragraphes as $p) {
            $this->addParagraphe($p);
        }
        //$this->paragraphes = $paragraphes;
    }
    
    public function addParagraphe (Paragraphe $paragraphe) {
        $this->paragraphes[] = $paragraphe;
        if ($paragraphe->getDossier() !== $this) {
            $paragraphe->setDossier($this);
        }
    }
}

<?php

namespace QD\SuperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Paragraphe
 *
 * @author formation
 * @ORM\Entity
 * @ORM\Table(name="t_paragraphe")
 */
class Paragraphe {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 100
     * )
     */
    protected $titre;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Length(
     *      max = 100
     * )
     */
    protected $sousTitre;
    /**
     * @ORM\Column(type="string", length=1000)
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 1000
     * )
     */
    protected $contenu;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $ordre;
    /**
     * @ORM\ManyToOne(targetEntity="Dossier", inversedBy="paragraphes")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $dossier;
    /**
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist"})
     * @var Image
     **/
    private $image;
    
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

    public function getOrdre() {
        return $this->ordre;
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

    public function setOrdre($ordre) {
        $this->ordre = $ordre;
    }

    /**
     * 
     * @return Dossier
     */
    public function getDossier() {
        return $this->dossier;
    }

    public function setDossier(Dossier $dossier) {
        $this->dossier = $dossier;
        if (!$dossier->getParagraphes()->contains($this)) {
            $dossier->addParagraphe($this);
        }
    }

    /**
     * 
     * @return Image
     */
    public function getImage() {
        return $this->image;
    }

    public function setImage(Image $image) {
        $this->image = $image;
    }



        
}

<?php

namespace QD\SuperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Image
 *
 * @author formation
 * @ORM\Entity
 * @ORM\Table(name="t_image")
 */
class Image {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nom;
    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $url;
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setUrl($url) {
        $this->url = $url;
    }
}

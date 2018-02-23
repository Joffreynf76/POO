<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuteurRepository")
 * @ORM\Table(name="Auteur")
 */
class Auteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields
    /**
     *
     * @ORM\Column(type="string",length=45)
     */
    private $prenom;
    /**
     *
     * @ORM\Column(type="string",length=45)
     */
    private $nom;
    /**
     *
     * @ORM\Column(type="string",length=255,unique=true)
     */
    private $email;
    /**
     *
     * @ORM\Column(type="string",length=45)
     */
    private $password;
    /**
     *
     * @ORM\Column(type="datetime")
     */
    private $dateinscription;
    /**
     *
     * @ORM\Column(type="array")
     */
    private $role;
    /**
     *
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $derniereconnexion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="auteur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $articles;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

    /**
     * @param mixed $dateinscription
     */
    public function setDateinscription($dateinscription): void
    {
        $this->dateinscription = $dateinscription;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getDerniereconnexion()
    {
        return $this->derniereconnexion;
    }

    /**
     * @param mixed $derniereconnexion
     */
    public function setDerniereconnexion($derniereconnexion): void
    {
        $this->derniereconnexion = $derniereconnexion;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param mixed $articles
     */
    public function setArticles($articles): void
    {
        $this->articles = $articles;
    }
    public function __construct() {
        $this->dateinscription = new \DateTime();
        $this->articles = new ArrayCollection();
    }


}

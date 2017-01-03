<?php

namespace AlterEgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="AlterEgoBundle\Repository\EntrepriseRepository")
 */
class Entreprise
{

    /**
     * @ORM\OneToMany(targetEntity="InfoEmploye", mappedBy="entreprise")
     */
    private $infosEmploye;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="entreprise")
     *
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var text
     *
     * @ORM\Column(name="contact", type="text")
     */
    private $contact;

//    /**
//     * @var int
//     *
//     * @ORM\Column(name="id_user", type="integer")
//     */
//    private $idUser;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Entreprise
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Entreprise
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Entreprise
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return mixed

     */
    public function getInfosEmploye()
    {
        return $this->infosEmploye;
    }

    /**
     * @param mixed $infosEmploye
     */
    public function setInfosEmploye($infosEmploye)
    {
        $this->infosEmploye = $infosEmploye;


//
//    /**
//     * Set idUser
//     *
//     * @param integer $idUser
//     *
//     * @return Entreprise
//     */
//    public function setIdUser($idUser)
//    {
//        $this->idUser = $idUser;
//
//        return $this;
//    }
//
//    /**
//     * Get idUser
//     *
//     * @return int
//     */
//    public function getIdUser()
//    {
//        return $this->idUser;
//    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->infosEmploye = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add infosEmploye
     *
     * @param \AlterEgoBundle\Entity\InfoEmploye $infosEmploye
     *
     * @return Entreprise
     */
    public function addInfosEmploye(\AlterEgoBundle\Entity\InfoEmploye $infosEmploye)
    {
        $this->infosEmploye[] = $infosEmploye;

        return $this;
    }

    /**
     * Remove infosEmploye
     *
     * @param \AlterEgoBundle\Entity\InfoEmploye $infosEmploye
     */
    public function removeInfosEmploye(\AlterEgoBundle\Entity\InfoEmploye $infosEmploye)
    {
        $this->infosEmploye->removeElement($infosEmploye);

    }



//
//    /**
//     * Set idUser
//     *
//     * @param integer $idUser
//     *
//     * @return Entreprise
//     */
//    public function setIdUser($idUser)
//    {
//        $this->idUser = $idUser;
//
//        return $this;
//    }
//
//    /**
//     * Get idUser
//     *
//     * @return int
//     */
//    public function getIdUser()
//    {
//        return $this->idUser;
//    }

}

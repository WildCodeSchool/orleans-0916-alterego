<?php


namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;
use AlterEgoBundle\Entity\Image;


/**
 * User
 *
 * @ORM\Table(name="fos_user_user")
 * @ORM\Entity
 */
class User extends BaseUser
{

    /**
     * @ORM\OneToMany(targetEntity="\AlterEgoBundle\Entity\Activite", mappedBy="user")
     */
    private $activites;


    /**
     * @ORM\OneToOne(targetEntity="\AlterEgoBundle\Entity\Entreprise", mappedBy="user")
     */
    private $entreprise;

    /**
     * @ORM\OneToMany(targetEntity="\AlterEgoBundle\Entity\Reservation", mappedBy="user")
     */
    protected $reservations;

    /**
     * @ORM\OneToOne(targetEntity="\AlterEgoBundle\Entity\Image", mappedBy="user")
     */
    protected $photoprofil;

    /**
     * @return mixed
     */
    public function getPhotoprofil()
    {
        return $this->photoprofil;
    }

    /**
     * @param mixed $photoprofil
     */
    public function setPhotoprofil($photoprofil)
    {
        $this->photoprofil = $photoprofil;
    }



    /**
     * @return mixed
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * @param mixed $reservations
     */
    public function setReservations($reservations)
    {
        $this->reservations[] = $reservations;
    }

   
    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->activites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reservations = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getActivites()
    {
        return $this->activites;
    }

    /**
     * @param mixed $activites
     */
    public function setActivites($activites)
    {
        $this->activites = $activites;
    }

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
}

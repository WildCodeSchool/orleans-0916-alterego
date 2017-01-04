<?php

namespace AlterEgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity(repositoryClass="AlterEgoBundle\Repository\ActiviteRepository")
 */
class Activite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="activite", type="string", length=255)
     */
    private $activite;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text")
     */
    private $info;

    /**
     * @ORM\OneToMany(targetEntity="Creneau", mappedBy="activite")
     */
    private $creneaux;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="activites")
     *
     */
    private $user;

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
     * Set activite
     *
     * @param string $activite
     *
     * @return Activite
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return string
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Activite
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set info
     *
     * @param string $info
     *
     * @return Activite
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }
    
    /**
     * @return mixed
     */
    public function getCreneaux()
    {
        return $this->creneaux;
    }

    /**
     * @param mixed $creneaux
     */
    public function setCreneaux($creneaux)
    {
        $this->creneaux = $creneaux;
    }



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creneaux = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add creneaux
     *
     * @param \AlterEgoBundle\Entity\Creneau $creneaux
     *
     * @return Activite
     */
    public function addCreneaux(\AlterEgoBundle\Entity\Creneau $creneaux)
    {
        $this->creneaux[] = $creneaux;

        return $this;
    }

    /**
     * Remove creneaux
     *
     * @param \AlterEgoBundle\Entity\Creneau $creneaux
     */
    public function removeCreneaux(\AlterEgoBundle\Entity\Creneau $creneaux)
    {
        $this->creneaux->removeElement($creneaux);
    }

    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     *
     * @return Activite
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

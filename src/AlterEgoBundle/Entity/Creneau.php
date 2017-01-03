<?php

namespace AlterEgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creneau
 *
 * @ORM\Table(name="creneau")
 * @ORM\Entity(repositoryClass="AlterEgoBundle\Repository\CreneauRepository")
 */
class Creneau
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
     * @var int
     *
     * @ORM\Column(name="activite_idactivite", type="integer")
     */
    private $activiteIdactivite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateheure", type="datetime")
     */
    private $dateheure;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity="Activite", inversedBy="creneaux")
     */
    private $activite;

    /**
     * @ORM\ManyToOne(targetEntity="Reservation", inversedBy="creneau")
     */
    private $reservations;

    /**
     * @ORM\ManyToOne(targetEntity="TestPerf", inversedBy="creneau")
     */
    private $perfs;

    /**
     * @return mixed
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * @param mixed $activite
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;
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
        $this->reservations = $reservations;
    }

    /**
     * @return mixed
     */
    public function getPerfs()
    {
        return $this->perfs;
    }

    /**
     * @param mixed $perfs
     */
    public function setPerfs($perfs)
    {
        $this->perfs = $perfs;
    }
    
    
    
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
     * Set activiteIdactivite
     *
     * @param integer $activiteIdactivite
     *
     * @return Creneau
     */
    public function setActiviteIdactivite($activiteIdactivite)
    {
        $this->activiteIdactivite = $activiteIdactivite;

        return $this;
    }

    /**
     * Get activiteIdactivite
     *
     * @return int
     */
    public function getActiviteIdactivite()
    {
        return $this->activiteIdactivite;
    }

    /**
     * Set dateheure
     *
     * @param \DateTime $dateheure
     *
     * @return Creneau
     */
    public function setDateheure($dateheure)
    {
        $this->dateheure = $dateheure;

        return $this;
    }

    /**
     * Get dateheure
     *
     * @return \DateTime
     */
    public function getDateheure()
    {
        return $this->dateheure;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Creneau
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add activite
     *
     * @param \AlterEgoBundle\Entity\Activite $activite
     *
     * @return Creneau
     */
    public function addActivite(\AlterEgoBundle\Entity\Activite $activite)
    {
        $this->activites[] = $activite;

        return $this;
    }

    /**
     * Remove activite
     *
     * @param \AlterEgoBundle\Entity\Activite $activite
     */
    public function removeActivite(\AlterEgoBundle\Entity\Activite $activite)
    {
        $this->activites->removeElement($activite);
    }
}


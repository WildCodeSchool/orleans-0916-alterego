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
     * @ORM\ManyToOne(targetEntity="Activite", inversedBy="creneaux")
     */
    private $activite;

    /**
     * @ORM\OneToMany(targetEntity="TestPerf", mappedBy="creneau")
     */
    private $testsPerf;

    /**
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="creneau")
     */
    private $reservations;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
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
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var int
     *
     * @ORM\Column(name="capacite", type="integer")
     */
    private $capacite;

    /**
     * @var int
     * @ORM\Column(name="placerestantes", type="integer")
     */
    private $placerestantes;

    /**
     * @var int
     * @ORM\Column(name="startseance", type="integer")
     */
    private $startseance;

    /**
     * @return mixed
     */
    public function getPlacerestantes()
    {
        return $this->placerestantes;
    }

    /**
     * @param mixed $placerestantes
     */
    public function setPlacerestantes($placerestantes)
    {
        $this->placerestantes = $placerestantes;
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
     * @return mixed
     */
    public function getTestsPerf()
    {
        return $this->testsPerf;
    }

    /**
     * @param mixed $testsPerf
     */
    public function setTestsPerf($testsPerf)
    {
        $this->testsPerf = $testsPerf;
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
     * Constructor
     */
    public function __construct()
    {
        $this->testsPerf = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reservations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add testsPerf
     *
     * @param \AlterEgoBundle\Entity\TestPerf $testsPerf
     *
     * @return Creneau
     */
    public function addTestsPerf(\AlterEgoBundle\Entity\TestPerf $testsPerf)
    {
        $this->testsPerf[] = $testsPerf;

        return $this;
    }

    /**
     * Remove testsPerf
     *
     * @param \AlterEgoBundle\Entity\TestPerf $testsPerf
     */
    public function removeTestsPerf(\AlterEgoBundle\Entity\TestPerf $testsPerf)
    {
        $this->testsPerf->removeElement($testsPerf);
    }

    /**
     * Add reservation
     *
     * @param \AlterEgoBundle\Entity\Reservation $reservation
     *
     * @return Creneau
     */
    public function addReservation(\AlterEgoBundle\Entity\Reservation $reservation)
    {
        $this->reservations[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \AlterEgoBundle\Entity\Reservation $reservation
     */
    public function removeReservation(\AlterEgoBundle\Entity\Reservation $reservation)
    {
        $this->reservations->removeElement($reservation);
    }
    
    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Creneau
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set capacite
     *
     * @param integer $capacite
     *
     * @return Creneau
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;

        return $this;
    }

    /**
     * Get capacite
     *
     * @return integer
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    

    /**
     * Set activite
     *
     * @param \AlterEgoBundle\Entity\Activite $activite
     *
     * @return Creneau
     */
    public function setActivite(\AlterEgoBundle\Entity\Activite $activite = null)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return \AlterEgoBundle\Entity\Activite
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set startseance
     *
     * @param integer $startseance
     *
     * @return Creneau
     */
    public function setStartseance($startseance)
    {
        $this->startseance = $startseance;

        return $this;
    }

    /**
     * Get startseance
     *
     * @return integer
     */
    public function getStartseance()
    {
        return $this->startseance;
    }
}

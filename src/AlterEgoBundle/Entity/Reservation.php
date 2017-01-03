<?php

namespace AlterEgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AlterEgoBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @ORM\Column(name="statusPayment", type="string", length=45)
     */
    private $statusPayment;

    /**
     * @var string
     *
     * @ORM\Column(name="note_coach", type="string", length=45)
     */
    private $noteCoach;

    /**
     * @ORM\OneToMany(targetEntity="Creneau", mappedBy="reservations")
     */
    private $creneau;

    /**
     * @return mixed
     */
    public function getCreneau()
    {
        return $this->creneau;
    }

    /**
     * @param mixed $creneau
     */
    public function setCreneau($creneau)
    {
        $this->creneau = $creneau;
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
     * Set statusPayment
     *
     * @param string $statusPayment
     *
     * @return Reservation
     */
    public function setStatusPayment($statusPayment)
    {
        $this->statusPayment = $statusPayment;

        return $this;
    }

    /**
     * Get statusPayment
     *
     * @return string
     */
    public function getStatusPayment()
    {
        return $this->statusPayment;
    }

    /**
     * Set noteCoach
     *
     * @param string $noteCoach
     *
     * @return Reservation
     */
    public function setNoteCoach($noteCoach)
    {
        $this->noteCoach = $noteCoach;

        return $this;
    }

    /**
     * Get noteCoach
     *
     * @return string
     */
    public function getNoteCoach()
    {
        return $this->noteCoach;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creneau = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add creneau
     *
     * @param \AlterEgoBundle\Entity\Creneau $creneau
     *
     * @return Reservation
     */
    public function addCreneau(\AlterEgoBundle\Entity\Creneau $creneau)
    {
        $this->creneau[] = $creneau;

        return $this;
    }

    /**
     * Remove creneau
     *
     * @param \AlterEgoBundle\Entity\Creneau $creneau
     */
    public function removeCreneau(\AlterEgoBundle\Entity\Creneau $creneau)
    {
        $this->creneau->removeElement($creneau);
    }
}


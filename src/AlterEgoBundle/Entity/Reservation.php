<?php

namespace AlterEgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AlterEgoBundle\Entity\Creneau;
use Application\Sonata\UserBundle\Entity\User;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AlterEgoBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\OneToOne(targetEntity="TestPerf", inversedBy="reservation")
     */
    private $testsPerf;

    /**
     * @ORM\ManyToOne(targetEntity="Creneau", inversedBy="reservations")
     */
    private $creneau;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="reservations")
     */
    private $user;
    
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
     * @ORM\Column(name="statusPayment", type="string", length=45, nullable=true)
     */
    private $statusPayment;

    /**
     * @var int
     *
     * @ORM\Column(name="note_coach", type="integer", nullable=true)
     */
    private $noteCoach;

    /**
     * @var int
     * 
     * @ORM\Column(name="is_present", type="integer", nullable=true)
     */
    private $ispresent;

    /**
     * @return mixed
     */
    public function getIspresent()
    {
        return $this->ispresent;
    }

    /**
     * @param mixed $ispresent
     */
    public function setIspresent($ispresent)
    {
        $this->ispresent = $ispresent;
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
     * @param int $noteCoach
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
     * @return int
     */
    public function getNoteCoach()
    {
        return $this->noteCoach;
    }

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
    public function setCreneau(Creneau $creneau)
    {
        $this->creneau = $creneau;
    }

    /**
     * @param mixed $infoEmploye
     */
    public function setInfoEmploye($infoEmploye)
    {
        $this->infoEmploye = $infoEmploye;
    }
    /**
     * @return mixed
     */
    public function getInfoEmploye()
    {
        return $this->infoEmploye;
    }


    /**
     * Set testsPerf
     *
     * @param \AlterEgoBundle\Entity\TestPerf $testsPerf
     *
     * @return Reservation
     */
    public function setTestsPerf(\AlterEgoBundle\Entity\TestPerf $testsPerf = null)
    {
        $this->testsPerf = $testsPerf;

        return $this;
    }

    /**
     * Get testsPerf
     *
     * @return \AlterEgoBundle\Entity\Creneau
     */
    public function getTestsPerf()
    {
        return $this->testsPerf;
    }

    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     *
     * @return Reservation
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

<?php

namespace AlterEgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoEmploye
 *
 * @ORM\Table(name="infos_employe")
 * @ORM\Entity(repositoryClass="AlterEgoBundle\Repository\InfoEmployeRepository")
 */
class InfoEmploye
{

    /**
    * @ORM\OneToOne(targetEntity="TestPerf")
    */
    private $testPerf;

    /** @ORM\OneToOne(targetEntity="Reservation")
    *
    */
    private $reservation;


    /**
     * @ORM\ManyToOne(targetEntity="Entreprise", inversedBy="infosEmploye")

     */
    private $entreprise;


    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
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
     * @var int
     *
     * @ORM\Column(name="poids", type="integer")
     */
    private $poids;

    /**
     * @var int
     *
     * @ORM\Column(name="taille", type="integer")
     */
    private $taille;

    /**
     * @var int
     *
     * @ORM\Column(name="imc", type="integer")
     */
    private $imc;

    /**
     * @var string
     *
     * @ORM\Column(name="forme", type="string", length=255)
     */
    private $forme;

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
     * Set poids
     *
     * @param integer $poids
     *
     * @return InfoEmploye
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return int
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     *
     * @return InfoEmploye
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return int
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set imc
     *
     * @param integer $imc
     *
     * @return InfoEmploye
     */
    public function setImc($imc)
    {
        $this->imc = $imc;

        return $this;
    }

    /**
     * Get imc
     *
     * @return int
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * Set forme
     *
     * @param string $forme
     *
     * @return InfoEmploye
     */
    public function setForme($forme)
    {
        $this->forme = $forme;

        return $this;
    }

    /**
     * Get forme
     *
     * @return string
     */
    public function getForme()
    {
        return $this->forme;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return InfoEmploye
     */
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
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param mixed $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * @return mixed
     */
    public function getTestPerf()
    {
        return $this->testPerf;
    }

    /**
     * @param mixed $testPerf
     */
    public function setTestPerf($testPerf)
    {
        $this->testPerf = $testPerf;
    }

}

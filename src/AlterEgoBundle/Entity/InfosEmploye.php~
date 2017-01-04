<?php

namespace AlterEgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\UserBundle\Entity\User;

/**
 * InfosEmploye
 *
 * @ORM\Table(name="infos_employe")
 * @ORM\Entity(repositoryClass="AlterEgoBundle\Repository\InfosEmployeRepository")
 */
class InfosEmploye
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

    /**
     * @ORM\OneToOne(targetEntity="User")
     */
    private $fosuser;

    /**
     * @return mixed
     */
    public function getFosuser()
    {
        return $this->fosuser;
    }

    /**
     * @param mixed $fosuser
     */
    public function setFosuser($fosuser)
    {
        $this->fosuser = $fosuser;
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
     * Set poids
     *
     * @param integer $poids
     *
     * @return InfosEmploye
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
     * @return InfosEmploye
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
     * @return InfosEmploye
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
     * @return InfosEmploye
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
     * @return InfosEmploye
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}


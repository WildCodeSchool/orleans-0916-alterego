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
}


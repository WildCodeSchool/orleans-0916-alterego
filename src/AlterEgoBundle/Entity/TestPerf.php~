<?php

namespace AlterEgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestPerf
 *
 * @ORM\Table(name="test_perf")
 * @ORM\Entity(repositoryClass="AlterEgoBundle\Repository\TestPerfRepository")
 */
class TestPerf
{

    /**
    * @ORM\OneToOne(targetEntity="InfoEmploye")
    */
    private $infoEmploye;

    /**
     * @ORM\ManyToOne(targetEntity="Creneau", inversedBy="testsPerf")
     */
    private $creneau;





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
     * @ORM\Column(name="calorie", type="integer")
     */
    private $calorie;

    /**
     * @var int
     *
     * @ORM\Column(name="endurance", type="integer")
     */
    private $endurance;

    /**
     * @var int
     *
     * @ORM\Column(name="souplesse", type="integer")
     */
    private $souplesse;

    /**
     * @var int
     *
     * @ORM\Column(name="equilibre", type="integer")
     */
    private $equilibre;


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
     * Set calorie
     *
     * @param integer $calorie
     *
     * @return TestPerf
     */
    public function setCalorie($calorie)
    {
        $this->calorie = $calorie;

        return $this;
    }

    /**
     * Get calorie
     *
     * @return int
     */
    public function getCalorie()
    {
        return $this->calorie;
    }

    /**
     * Set endurance
     *
     * @param integer $endurance
     *
     * @return TestPerf
     */
    public function setEndurance($endurance)
    {
        $this->endurance = $endurance;

        return $this;
    }

    /**
     * Get endurance
     *
     * @return int
     */
    public function getEndurance()
    {
        return $this->endurance;
    }

    /**
     * Set souplesse
     *
     * @param integer $souplesse
     *
     * @return TestPerf
     */
    public function setSouplesse($souplesse)
    {
        $this->souplesse = $souplesse;

        return $this;
    }

    /**
     * Get souplesse
     *
     * @return int
     */
    public function getSouplesse()
    {
        return $this->souplesse;
    }

    /**
     * Set equilibre
     *
     * @param integer $equilibre
     *
     * @return TestPerf
     */
    public function setEquilibre($equilibre)
    {
        $this->equilibre = $equilibre;

        return $this;
    }

    /**
     * Get equilibre
     *
     * @return int
     */
    public function getEquilibre()
    {
        return $this->equilibre;
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
    public function setCreneau($creneau)
    {
        $this->creneau = $creneau;
    }

    /**
     * @return mixed
     */
    public function getInfoEmploye()
    {
        return $this->infoEmploye;
    }

    /**
     * @param mixed $infoEmploye
     */
    public function setInfoEmploye($infoEmploye)
    {
        $this->infoEmploye = $infoEmploye;
    }



}

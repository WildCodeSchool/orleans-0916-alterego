<?php


namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use AlterEgoBundle\Entity\InfosEmploye;

/**
 *
 */
class User extends BaseUser
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="AlterEgoBundle/EntityInfosEmploye")
     */
    private $userinfo;

    /**
     * @return mixed
     */
    public function getUserinfo()
    {
        return $this->userinfo;
    }

    /**
     * @param mixed $userinfo
     */
    public function setUserinfo($userinfo)
    {
        $this->userinfo = $userinfo;
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

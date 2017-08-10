<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_user")
 */
class User extends OAuthUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $username;
}

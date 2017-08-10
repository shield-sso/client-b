<?php

namespace AppBundle\Provider;

use AppBundle\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class UserProvider extends EntityUserProvider
{
    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $resourceOwnerName = $response->getResourceOwner()->getName();

        if (!isset($this->properties[$resourceOwnerName])) {
            throw new \RuntimeException(sprintf("No property defined for entity for resource owner '%s'.", $resourceOwnerName));
        }

        $username = $response->getUsername();
        if (null === $user = $this->findUser(array($this->properties[$resourceOwnerName] => $username))) {
            $user = new User($username);
            $this->em->persist($user);
            $this->em->flush();
            if (null === $user = $this->findUser(array($this->properties[$resourceOwnerName] => $username))) {
                throw new UsernameNotFoundException(sprintf("User '%s' not found.", $username));
            }
        }

        return $user;
    }
}

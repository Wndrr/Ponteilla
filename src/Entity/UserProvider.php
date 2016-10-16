<?php
// src/AppBundle/Security/User/WebserviceUserProvider.php
namespace Entity;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class UserProvider implements UserProviderInterface
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function loadUserByUsername($username)
    {      
        $user = $this->em->getRepository('Entity\User')->findOneBy(array('username' => $username));

        if($user != null)
            return $user;

        throw new \Symfony\Component\Security\Core\Exception\BadCredentialsException();
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof \Entity\User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === '\Symfony\Component\Security\Core\User\User';
    }
}
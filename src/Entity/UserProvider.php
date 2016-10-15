<?php
// src/AppBundle/Security/User/WebserviceUserProvider.php
namespace Entity;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class UserProvider implements UserProviderInterface
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function loadUserByUsername($username)
    {      
        if($username == 't')
            return new \Symfony\Component\Security\Core\User\User('t', 'd', ['ROLE_ADMIN'], true, true, true, true);

        throw new \Symfony\Component\Security\Core\Exception\BadCredentialsException();
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof \Symfony\Component\Security\Core\User\User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === '\Symfony\Component\Security\Core\User\User';
    }
}
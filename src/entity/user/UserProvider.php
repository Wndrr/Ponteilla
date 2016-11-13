<?php
/**
 * @Author: Mathieu VIALES
 * @Date:   2016-10-19 17:55:38
 * @Last Modified by:   Mathieu VIALES
 * @Last Modified time: 2016-10-21 11:59:42
 */

namespace Entity\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

use Doctrine\ORM\EntityManager;

/**
 * Interface between the data layer and the buisness layer
 */
class UserProvider implements UserProviderInterface
{
    /**
     * Instance of the entity manager
     */
    private $em;

    /**
     * Well that's a constructor ...
     */
    public function __construct(EntityManager $em)
    {
        $this->_em = $em;
    }

    /**
     * Fetch a User from the database by username
     */
    public function loadUserByUsername($username)
    {      
        $user = $this->_em->getRepository('Entity\User\User')->findOneBy(array('username' => $username));

        if($user != null)
            return $user;

        throw new UsernameNotFoundException("Compte introuvable");
    }

    /**
     * Fetch a User from the database by email
     */
    public function loadUserByEmail($email)
    {      
        $user = $this->_em->getRepository('Entity\User\User')->findOneBy(array('email' => $email));

        if($user != null)
            return $user;

        throw new UsernameNotFoundException("Compte introuvable");
    }

    /**
     * Update the User's properties
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) 
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));        

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * Ensure the provided User is an instance of the expected class
     */
    public function supportsClass($class)
    {
        return $class === '\Entity\User\User';
    }
}
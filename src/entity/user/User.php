<?php
/**
 * @Author: Wndrr
 * @Date:   2016-10-14 22:43:29
 * @Last Modified by:   Mathieu VIALES
 * @Last Modified time: 2016-10-19 17:58:30
 */

namespace Entity\User;

use Doctrine\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Table(name="user")
 * @Entity(repositoryClass="Entity\User\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @Column(type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", unique=true)
     */
    private $username;

    /**
     * @Column(type="string",)
     */
    private $password;

    /**
     * @Column(type="string", unique=true)
     */
    private $email;

    /**
     * @Column(type="string")
     */
    private $salt;

    /**
     * @Column(type="string")
     */
    private $roles;

    /**
     * @Column(name="isActive", type="boolean", options={"default":false})
     */
    private $isActive;

    public function __construct($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->salt = '';
        $this->roles = 'ROLE_USER';
        $this->isActive = false;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return '';
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return split(',', $this->roles);
    }

    public function setRoles($roles)
    {
        return $this->roles = $roles;
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}

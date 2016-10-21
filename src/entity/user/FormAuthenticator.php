<?php
/**
 * @Author: Mathieu VIALES
 * @Date:   2016-10-19 17:56:14
 * @Last Modified by:   Mathieu VIALES
 * @Last Modified time: 2016-10-21 11:59:44
 */

namespace Entity\User;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

use Symfony\Component\Security\Core\Security;

use Silex\Application;

/**
 * Authenticate a User using the data fed by a login form
 */
class FormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $_app;

    /**
     * It's the constructor. It does basically that, it constructs. Unexpected, uh ?
     */
    public function __construct(Application $app)
    {
        $this->_app = $app;
    } 

    /**
     * Check the request route
     * Build and return a credentials array
     */
    public function getCredentials(Request $request)
    {        
        // Only authenticate the user when the authentication route is required 
        if($request->getPathInfo() != $this->_app['security.firewalls']['admin']['form']['check_path']) 
            return;

        $username = $request->get('_username');
        $request->getSession()->set(Security::LAST_USERNAME, $username);

        $redentials = array
        (
            'username' => $username,
            'password' => $request->get('_password')
        );

        return $redentials;
    }

    /**
     * Fetch a User from the database
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {        
        if(preg_match('/.+@.+/', $credentials['username']))
        return $userProvider->loadUserByEmail($credentials['username']);

        return $userProvider->loadUserByUsername($credentials['username']);
    }

    /**
     * Make sure the password from the form matches the password from the database
     */
    public function checkCredentials($credentials, UserInterface $user)
    {        
        if($credentials['password'] == $user->getPassword())
            return true;

        throw new BadCredentialsException("Mot de passe incorect");
    }

    /**
     * Return the URL to the login route
     */
    protected function getLoginUrl()
    {
        return $this->_app['url_generator']->generate('hiking_login');
    }

    /**
     * Return the URL to a route after a successful login
     */
    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->_app['url_generator']->generate('hiking_index');
    }
}
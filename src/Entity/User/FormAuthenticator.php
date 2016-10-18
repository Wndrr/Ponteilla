<?php

namespace Entity\User;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class FormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $app;


    public function __construct($app)
    {
        $this->app = $app;
    }

    public function getCredentials(Request $request)
    {        
        if ($request->getPathInfo() != '/hiking/admin/login_check') 
        {

            return;
        }

        $username = $request->get('_username');
        $request->getSession()->set(Security::LAST_USERNAME, $username);
        $password = $request->get('_password');
        return array
        (
            'username' => $username,
            'password' => $password
        );
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $credentials = $credentials['username'];

        return $userProvider->loadUserByUsername($credentials);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        if($credentials['password'] == $user->getPassword())
            return true;

        throw new BadCredentialsException("Mot de passe incorect");
    }

    protected function getLoginUrl()
    {
        $this->app['log']->addInfo("loginUrl");
        return $this->app['url_generator']->generate('hiking_login');
    }

    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->app['url_generator']->generate('hiking_index');
    }
}
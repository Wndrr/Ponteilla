<?php

namespace Entity;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class TokenAuthenticator extends AbstractGuardAuthenticator
{
    private $loginPath;


    public function __construct($loginPath)
    {
        $this->loginPath = $loginPath;
    }

    /**
     * Called on every request. Return whatever credentials you want,
     * or null to stop authentication.
     */
    public function getCredentials(Request $request)
    {
        // Checks if the credential header is provided
        if (!$token = $request->headers->get('X-AUTH-TOKEN')) {
            return;
        }

        // Parse the header or ignore it if the format is incorrect.
        if (false === strpos($token, ':')) {
            return;
        }
        $username = $request->get('_username');
        $password = $request->get('_password');
        // What you return here will be passed to getUser() as $credentials
        return array(
            'username' =>$username,
            'password' =>  $password
        );
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $credentials = $credentials['username'];

        // if null, authentication will fail
        // if a User object, checkCredentials() is called
        return $userProvider->loadUserByUsername($credentials);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // check credentials - e.g. make sure the password is valid
        // no credential check is needed in this case

        // return true to cause authentication success

       //new \Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken();

        if($credentials['password'] == 'd')
            return true;

        throw new \Symfony\Component\Security\Core\Exception\BadCredentialsException("patate");
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = array(
            'message' => 'Identifiant ou mot de passe incorrecte'

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        );

        return new JsonResponse($data, 403);
    }

    /**
     * Called when authentication is needed, but it's not sent
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new \Symfony\Component\HttpFoundation\RedirectResponse($this->loginPath);
    }

    public function supportsRememberMe()
    {
        return false;
    }

}
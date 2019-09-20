<?php

namespace App\Security;

use App\Repository\UzytkownicyRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use function mysql_xdevapi\getSession;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    /**
     * @var UzytkownicyRepository
     */
    private $userRepository;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(UzytkownicyRepository $userRepository, RouterInterface $router)
    {

        $this->userRepository = $userRepository;
        $this->router = $router;
    }

    public function supports(Request $request)
    {
        return $request->attributes->get('_route')==='login' && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
//        dd($request->request->all());
        $credentials = [
            'username' => $request->request->get('_username'),
            'password' => $request->request->get('_password')
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['username']
        );
        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $this->userRepository->findOneBy(['username'=>$credentials['username']]);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        if( $this->userRepository->findOneBy(array('username'=>$credentials['username'],'password'=>$credentials['password'])) ==true);
        {
            return true;
        }

            return false;

    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {


    }

    /**
     * Return the URL to the login page.
     *
     * @return string
     */
    protected function getLoginUrl()
    {
        return $this->router->generate('login');
    }
}

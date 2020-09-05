<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\AuthService;
use App\Service\Request;

class AuthController extends Controller
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function index()
    {
        if($this->authService->isLogged()) {
            header('Location: /message');
            exit;
        }

        $this->render('auth');
    }

    /**
     * @param Request $request
     */
    public function login(Request $request)
    {
        if($this->authService->isLogged()) {
            header('Location: /message');
            exit;
        }

        $pseudo = htmlentities(strip_tags(trim($request->post('pseudo'))));
        $password = md5(trim($request->post('password')));

        /*
         * le cas des identifiants sont les deux correct on connect le User.
         */
        $row = $this->authService->login($pseudo, $password);

        if(!empty($row)) {

            header('Location: /message');
            exit;
        }

        /*
         * le cas de Pseudo déja existe on retourne un message d'erreur.
         */
        $user = User::getUserByPseudo($pseudo);

        if(!empty($user)) {
            $_SESSION['errors']['login'] = 'Pseudo ou mot passe invalid';
            header('Location: /auth');
            exit;
        }

        /*
         * Dérniere cas on enregistre le utilisateur piusque n'est pas déja existe en BD.
         */
        User::createUser($pseudo, $password);

        $this->authService->login($pseudo, $password);
        header('Location: /message');
        exit;
    }


    public function logout()
    {
        session_destroy();
        header('Location: /auth');
    }
}

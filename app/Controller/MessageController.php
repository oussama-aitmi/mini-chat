<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Message;
use App\Service\AuthService;
use App\Service\Request;

class MessageController extends Controller
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * Page index pour listing des messages
     */
    public function index()
    {
        if(!$this->authService->isLogged()) {
            header('Location: /auth');
            exit;
        }

        $this->render('messages', [
            'listConnected' => User::getAllUsers()
        ]);
    }

    /**
     * Enregistrement des message en BDD
     */
    public function messages(Request $request)
    {
        if(!$this->authService->isLogged()) {
            header('Location: /auth');
            exit;
        }

        if (isset($_POST['message'])) {
            $user = $_SESSION['user'];
            Message::addMessage(htmlentities(strip_tags($_POST['message'])), $user['id']);
        }
    }

    /**
     * Recupération de tous les messages
     */
    public function display()
    {
        if(!$this->authService->isLogged()) {
            header('Location: /auth');
            exit;
        }

        $this->render(
            'display',
            array(
                'messageList' => Message::getAllMessages()
            )
        );
    }
}

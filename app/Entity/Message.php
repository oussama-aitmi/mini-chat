<?php

namespace App\Entity;

use App\Service\Database;

class Message
{
    /**
     * Enregistrement des messages
     *
     * @param string $message message entrée
     * @param int $userId identifiant de l'utilisateur
     */
    public static function addMessage($message, $userId)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare(
            'INSERT INTO tchat_message (tchat_user_id,message,date) VALUES (:userId, :message, now())'
        );
        $stmt->execute(
            array(
                ':userId' => $userId,
                ':message' => $message,
            )
        );
    }

    /**
     * Recupère tous les messages
     *
     * @return array
     */
    public static function getAllMessages()
    {
        $db = Database::getInstance();
        $stmt = $db->prepare(
            'SELECT DATE_FORMAT(tm.date,"%d-%m-%Y %H:%i:%s") as dateMessage, tm.message, tu.pseudo FROM tchat_message tm INNER JOIN tchat_user tu ON tu.id = tm.tchat_user_id ORDER BY date DESC'
        );
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

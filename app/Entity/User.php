<?php

namespace App\Entity;

use App\Service\Database;

class User
{
    /**
     * Création d'un tulisateur en fonction du pseudo et du mot de passe
     *
     * @param string $pseudo
     * @param string $password hach password
     */
    public static function createUser($pseudo, $password)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare(
            'INSERT INTO tchat_user (pseudo,password) VALUES (:pseudo, :password)'
        );
        $stmt->execute(
            array(
                ':pseudo' => $pseudo,
                ':password' => $password,
            )
        );
    }

    /**
     * Retourne le user en fonction du pseudo et du mot de passe
     *
     * @param string $speudo
     * @return array
     */
    public static function getUser($pseudo, $password)
    {
        try {
            $db = Database::getInstance();
            $stmt = $db->prepare('SELECT * FROM tchat_user WHERE pseudo = :pseudo AND password = :password');
            $stmt->execute(array(':pseudo' => $pseudo, ':password' => $password));
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Check if user exist
     *
     * @param string $speudo
     * @return array
     */
    public static function getUserByPseudo($pseudo)
    {
        try {
            $db = Database::getInstance();
            $stmt = $db->prepare('SELECT * FROM tchat_user WHERE pseudo = :pseudo');
            $stmt->execute(array(':pseudo' => $pseudo));
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }


    /**
     *
     * @return type
     */
    public static function getAllUsers()
    {
        try {
            $db = Database::getInstance();
            $stmt = $db->prepare('SELECT pseudo FROM tchat_user');
            $stmt->execute(array());
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
        }
    }

}

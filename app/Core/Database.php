<?php

namespace App\Core;

use PDO;
use PDOException;
use App\Core\Config;

/**
 * Loads database connection.
 */
class Database
{
    /** @var PDO Instance. */
    private static PDO $instance;

    /**
     * @return PDO
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                $config = Config::getInstance();

                // Create connection to database.
                self::$instance = new PDO(
                    $config->database[0]->Type .
                    ':host=' . $config->database[0]->Hostname .
                    ';port=' . $config->database[0]->Port .
                    ';dbname=' . $config->database[0]->Database,
                    $config->database[0]->Username,
                    $config->database[0]->Password
                );
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
        return self::$instance;
    }
}


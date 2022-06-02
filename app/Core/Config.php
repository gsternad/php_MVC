<?php

namespace App\Core;

use Exception;

/**
 * Reads 'config.json' and returns contents.
 */
class Config
{
    /** @var null Holds configuration data. */
    private static $instance = NULL;

    /**
     * @return mixed|null
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                // Try to read config file into memory.
                self::$instance = json_decode(file_get_contents('../config.json'), false);
                if (json_last_error()) {
                    throw new Exception(json_last_error_msg());
                }
            } // If it fails to read the file it will throw an error.
            catch (Exception $e) {
                die("Failed to read 'config.json' file. Error: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}

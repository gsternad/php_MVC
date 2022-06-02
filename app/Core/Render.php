<?php

namespace App\Core;

use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Renders
 */
class Render
{
    /** @var Environment|null  */
    protected static ?Environment $instance = NULL;

    /**
     * @param string $path
     * @return Environment|void|null
     */
    public static function setInstance(string $path)
    {
        try {
            if (!self::$instance) {
                self::$instance = new Environment(new FilesystemLoader("$path/Views"));
            }
            return self::$instance;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * @return Environment|null
     */
    public static function getInstance()
    {
        return self::$instance;
    }
}

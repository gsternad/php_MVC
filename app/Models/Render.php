<?php

namespace App\Models;

/**
 * Render model.
 */
interface Render
{
    /** Returns Templating engine instance. */
    public static function getInstance();
}

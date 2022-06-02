<?php

namespace App\Models;

use App\Core\Request;

/**
 * Contract model.
 */
interface Contract
{
    /** Draws the actual page. */
    public function draw(Request $request);
}

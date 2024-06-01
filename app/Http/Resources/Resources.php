<?php

namespace App\Http\Resources;

use App\Models\County;

class Resources
{
    static public function getCounties()
    {
        return County::orderBy('name')->get();
    }
}

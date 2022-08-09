<?php

namespace App\Controllers;

use App\Models\Rate;
use Core\Controller;

class RateController extends Controller
{
    public function store()
    {
        Rate::create([
            'post_id' => $_POST['post_id'],
            'rate' => $_POST['rate']
        ]);
    }
}
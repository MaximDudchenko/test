<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Controller;

class PostController extends Controller
{
    public function store()
    {
        Post::create([
            'vizitore_name' => $_POST['name'],
            'post' => $_POST['post']
        ]);

    }
}
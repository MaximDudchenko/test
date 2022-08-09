<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Controller;

class PostController extends Controller
{
    public function store()
    {
        $id = Post::create([
            'vizitore_name' => $_POST['name'],
            'post' => $_POST['post']
        ]);

        $post = Post::find($id);

        die(json_encode($post));
    }
}
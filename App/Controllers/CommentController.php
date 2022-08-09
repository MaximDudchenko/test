<?php

namespace App\Controllers;

use App\Models\Comment;
use Core\Controller;

class CommentController extends Controller
{
    public function store()
    {
        Comment::create([
            'post_id' => $_POST['post_id'],
            'vizitore_name' => $_POST['name'],
            'comment' => $_POST['comment']
        ]);
    }
}
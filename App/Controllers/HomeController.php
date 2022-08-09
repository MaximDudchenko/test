<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Rate;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::all();
        $rates = Rate::all();

        View::render('index', ['posts' => $posts, 'comments' => $comments, 'rates' => $rates]);
    }
}
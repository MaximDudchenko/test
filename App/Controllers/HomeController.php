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
        $negativePosts = Post::countByRate('1, 2');
        $positivePosts = Post::countByRate('4, 5');
        $allPosts = Post::countByRate();

        View::render('index', [
            'posts' => $posts,
            'comments' => $comments,
            'negativePosts' => $negativePosts,
            'positivePosts' => $positivePosts,
            'allPosts' => $allPosts
            ]);
    }
}
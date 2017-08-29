<?php

namespace App\Http\Controllers;

use App\Post;
use App\Transformers\PostTransformer;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->latestFirst()->get();

        return fractal()
            ->collection($posts)
            ->transformWith(new PostTransformer);
    }
}

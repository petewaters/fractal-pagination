<?php

namespace App\Http\Controllers;

use App\Post;
use App\Transformers\PostTransformer;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->latestFirst()->paginate(10);

        return fractal()
            ->collection($posts)
            ->parseIncludes(['user'])
            ->transformWith(new PostTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($posts));
    }
}

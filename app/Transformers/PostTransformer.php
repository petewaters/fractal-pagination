<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user'];

    public function transform(Post $post)
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'human_created_at' => $post->created_at->diffForHumans(),
        ];
    }

    public function includeUser(Post $post)
    {
        return $this->item($post->user, new UserTransformer);
    }
}
<?php

namespace App\Repository\Post;

use App\Interfaces\Post\PostActionsInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Mockery\Exception;

class PostRepository implements PostActionsInterface
{

    public function getPosts(): Collection
    {
        return Post::all();
    }

    public function createPost(Post $post) : string
    {
        try {
            $post->save();
        } catch (\Exception $e) {
            throw new \Exception('Error in post creation, try again later... '.$e);
        }
        return $post->post_id;
    }

    public function deletePost(Post $post)
    {
        return $post->deleteOrFail();
    }

    public function updatePost(Post $post)
    {
        try {
            $post->fill($post->toArray());
            $post->save();
        } catch (Exception $e) {
            throw new \Exception('Error in post data update, try again later... '.$e);
        }
        return $post->post_id;
    }

    public function getPostById(string $id)
    {
        return Post::findOrFail($id);
    }
}

<?php

namespace App\Interfaces\Post;

use App\Models\Post;

interface PostActionsInterface
{
    public function getPosts();

    public function createPost(Post $post);

    public function deletePost(Post $post);

    public function updatePost(Post $post);

    public function getPostById(string $id);
}

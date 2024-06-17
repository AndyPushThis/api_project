<?php

namespace App\Repositories;

use App\Http\DTO\PostData;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository
{
    public function getAll(array $params):LengthAwarePaginator
    {
        return Post::query()->paginate($params['limit']);
    }

    public function create(PostData $postData): Model|Post
    {
        return Post::query()->create($postData->toArray());
    }

    public function show(int $id): Model|Post
    {
        return Post::query()->find($id);
    }

    public function update(PostData $postData): void
    {
        Post::query()->where('id', $postData->id)->update($postData->toArray());
    }

    public function delete(int $id): void
    {
        Post::query()->where('id', $id)->delete();
    }

}

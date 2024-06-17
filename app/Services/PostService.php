<?php

namespace App\Services;
use App\Http\DTO\PostData;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostCollection;
use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostService
{
    public function __construct(
        private readonly PostRepository $repository
    )
    {
    }

    public function getAll(array $params): ResourceCollection
    {
        $posts = $this->repository->getAll($params);
        return PostResource::collection($posts);
    }

    public function create(PostData $postData): PostResource
    {
        $post = $this->repository->create($postData);
        return PostResource::make($post);
    }

    public function show(int $id)
    {
        $post = $this->repository->show($id);
        return PostResource::make($post);
    }

    public function update(PostData $postData): JsonResponse
    {
        $this->repository->update($postData);
        return response()->json();
    }

    public function delete(int $id): JsonResponse
    {
        $this->repository->delete($id);
        return response()->json();
    }
}

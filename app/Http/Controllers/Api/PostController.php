<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\DTO\PostData;
use App\Http\Requests\Common\BaseGetRequest;
use App\Http\Requests\Post\GetPostIdRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostController extends Controller
{
    public function __construct(
        private PostService $service
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index(BaseGetRequest $request): ResourceCollection
    {
        return $this->service->getAll($request->validated());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BaseGetRequest $request):JsonResource
    {
        $postData = new PostData(...$request->validated());
        return $this->service->create($postData);
    }

    /**
     * Display the specified resource.
     */
    public function show(GetPostIdRequest $request): PostResource
    {
        return $this->service->show($request->post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request): JsonResponse
    {
        $postData = new PostData(...$request->validated());
        return $this->service->update($postData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GetPostIdRequest $request): JsonResponse
    {
        return $this->service->delete($request->post);
    }
}

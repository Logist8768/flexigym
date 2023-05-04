<?php

namespace Modules\Coach\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Coach\Actions\AddPostAction;
use Modules\Coach\Actions\ListPostsAction;
use Modules\Coach\Entities\Post;
use Modules\Coach\Http\Requests\AddPostRequest;
use Modules\Coach\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        return (new ListPostsAction)();
    }

    public function store(AddPostRequest $request)
    {
        (new AddPostAction)($request);

        return response()->json([
            'message' => 'Post is created successfully',
        ], 200);
    }

    public function show(Post $post)
    {
        return PostResource::make($post);
    }

}

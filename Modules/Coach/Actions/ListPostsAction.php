<?php

namespace Modules\Coach\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Coach\Http\Resources\PostCollection;

class ListPostsAction
{
    public function __invoke()
    {
        $posts = DB::table('posts')
            ->join('coaches', 'coaches.id', '=', 'posts.id')
            ->select('posts.title', 'posts.description', 'posts.cover_image',
                'posts.video_link', 'coaches.name', 'coaches.profession', 'coaches.gender')
            ->paginate(5);

        return new PostCollection($posts);
    }
}

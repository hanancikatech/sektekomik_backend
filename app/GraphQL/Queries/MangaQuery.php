<?php

namespace App\GraphQL\Queries;

use App\Models\Manga;

class MangaQuery
{
    public function all()
    {
        return Manga::with(['media' , 'categories'])->paginate();
    }
}

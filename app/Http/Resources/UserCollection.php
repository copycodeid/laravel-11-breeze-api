<?php

namespace App\Http\Resources;

use App\Helpers\ApiPaginatorHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    use ApiPaginatorHelper;

    public function toArray(Request $request): array
    {
        return [
            'users' => UserResource::collection($this->collection),
            ...$this->getSimplePaginationMetaLinks($this),
        ];
    }
}

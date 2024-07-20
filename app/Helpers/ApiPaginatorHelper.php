<?php

namespace App\Helpers;

use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiPaginatorHelper
{
    public function getPaginationMeta(mixed $paginator): array
    {
        return [
            'current_page' => $paginator->currentPage(),
            'from' => $paginator->firstItem(),
            'last_page' => $paginator->lastPage(),
            'links' => $paginator->linkCollection(),
            'path' => $paginator->path(),
            'per_page' => $paginator->perPage(),
            'to' => $paginator->lastItem(),
            'total' => $paginator->total(),
            'has_pages' => $paginator->hasPages(),
            'has_more_pages' => $paginator->hasMorePages(),
        ];
    }

    public function getPaginationLinks(mixed $paginator): array
    {
        return [
            'first' => $paginator->url(1),
            'last' => $paginator->url($paginator->lastPage()),
            'prev' => $paginator->previousPageUrl(),
            'next' => $paginator->nextPageUrl(),
        ];
    }

    public function getPaginationMetaLinks(mixed $paginator): array
    {
        return [
            'links' => $this->getPaginationLinks($paginator),
            'meta' => $this->getPaginationMeta($paginator),
        ];
    }

    public function getSimplePaginationMeta(ResourceCollection $paginator): array
    {
        return [
            'current_page' => $paginator->currentPage(),
            'from' => $paginator->firstItem(),
            'last_page' => $paginator->lastPage(),
            'path' => $paginator->path(),
            'per_page' => $paginator->perPage(),
            'to' => $paginator->lastItem(),
            'total' => $paginator->total(),
            'has_pages' => $paginator->hasPages(),
            'has_more_pages' => $paginator->hasMorePages(),
        ];
    }

    public function getSimplePaginationLinks(ResourceCollection $paginator): array
    {
        return [
            'first' => $paginator->url(1),
            'last' => $paginator->url($paginator->lastPage()),
            'prev' => $paginator->previousPageUrl(),
            'next' => $paginator->nextPageUrl(),
        ];
    }

    public function getSimplePaginationMetaLinks(ResourceCollection $paginator): array
    {
        return [
            'links' => $this->getSimplePaginationLinks($paginator),
            'meta' => $this->getSimplePaginationMeta($paginator),
        ];
    }
}

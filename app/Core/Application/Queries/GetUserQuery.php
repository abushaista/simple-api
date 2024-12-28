<?php

namespace App\Core\Application\Queries;


class GetUserQuery {
    public function __construct(
        public ?string $searchTerm = null,
        public int $page = 0,
        public string $sortBy = 'name',
    ){}
}
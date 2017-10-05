<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class ThreadFilters extends Filter
{
    protected $filters = ['by', 'popular'];

    public function by($username)
    {
        $user = User::whereName($username)->firstOrFail();
        return $this->builder->whereUserId($user->id);
    }

    public function popular()
    {
        // clean de orderBy in the query
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('replies_count', 'desc');
    }
}
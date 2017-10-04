<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class ThreadFilters extends Filter
{
    protected $filters = ['by'];

    public function by($username)
    {
        $user = User::whereName($username)->firstOrFail();
        return $this->builder->whereUserId($user->id);
    }
}
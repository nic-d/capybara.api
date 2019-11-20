<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    /**
     * @param Request $request
     * @return UserResource
     */
    public function __invoke(Request $request) : UserResource
    {
        return new UserResource($request->user());
    }
}

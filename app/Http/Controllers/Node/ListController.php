<?php

declare(strict_types=1);

namespace App\Http\Controllers\Node;

use App\Http\Controllers\Controller;
use App\Http\Resources\NodeResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListController extends Controller
{
    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function __invoke(Request $request) : AnonymousResourceCollection
    {
        /** @var User $user */
        $user = $request->user();

        $nodes = $user
            ->nodes()
            ->orderByDesc('created_at')
            ->paginate(15)
        ;

        return NodeResource::collection($nodes);
    }
}

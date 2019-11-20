<?php

declare(strict_types=1);

namespace App\Http\Controllers\Node;

use App\Http\Controllers\Controller;
use App\Http\Resources\NodeResource;
use App\Models\Node;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    /**
     * @param Request $request
     * @param Node $node
     * @return NodeResource
     * @throws AuthorizationException
     */
    public function __invoke(Request $request, Node $node) : NodeResource
    {
        $this->authorize('owns-node', $node);
        return new NodeResource($node);
    }
}

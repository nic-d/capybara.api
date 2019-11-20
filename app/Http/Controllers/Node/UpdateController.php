<?php

declare(strict_types=1);

namespace App\Http\Controllers\Node;

use App\Http\Controllers\Controller;
use App\Http\Resources\NodeResource;
use App\Models\Node;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateController extends Controller
{
    /**
     * @param Request $request
     * @param Node $node
     * @return NodeResource
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function __invoke(Request $request, Node $node)
    {
        $this->authorize('owns-node', $node);

        $this->validate($request, [
            'name' => ['sometimes', 'string'],
            'description' => ['sometimes', 'nullable', 'string'],
        ]);

        $node->update([
            'name' => $request->get('name', $node->name),
            'description' => $request->get('description', $node->description),
        ]);

        return new NodeResource($node);
    }
}

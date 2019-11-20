<?php

declare(strict_types=1);

namespace App\Http\Controllers\Node;

use App\Http\Controllers\Controller;
use App\Models\Node;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * @param Request $request
     * @param Node $node
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function __invoke(Request $request, Node $node) : JsonResponse
    {
        $this->authorize('owns-node', $node);

        $node->delete();

        return response()->json([
            'error' => false,
        ]);
    }
}

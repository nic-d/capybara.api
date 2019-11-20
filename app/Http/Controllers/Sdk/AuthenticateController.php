<?php

declare(strict_types=1);

namespace App\Http\Controllers\Sdk;

use App\Http\Controllers\Controller;
use App\Http\Resources\NodeResource;
use App\Models\Node;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthenticateController extends Controller
{
    /**
     * @param Request $request
     * @return NodeResource
     * @throws ValidationException
     */
    public function __invoke(Request $request) : NodeResource
    {
        $this->validate($request, [
            'token' => ['required', 'string'],
        ]);

        /** @var Node $node */
        $node = Node::where('auth_token', $request->get('token'))->firstOrFail();

        return new NodeResource($node);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Node;

use App\Http\Controllers\Controller;
use App\Http\Resources\NodeResource;
use App\Models\Node;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CreateController extends Controller
{
    /**
     * @param Request $request
     * @return NodeResource
     * @throws ValidationException
     */
    public function __invoke(Request $request) : NodeResource
    {
        /** @var User $user */
        $user = $request->user();

        $this->validate($request, [
            'name' => ['required', 'string'],
            'description' => ['sometimes', 'nullable', 'string'],
        ]);

        /** @var Node $node */
        $node = $user
            ->nodes()
            ->create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ])
        ;

        return new NodeResource($node);
    }
}

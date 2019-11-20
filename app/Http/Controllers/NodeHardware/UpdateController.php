<?php

declare(strict_types=1);

namespace App\Http\Controllers\NodeHardware;

use App\Http\Controllers\Controller;
use App\Http\Resources\NodeHardwareResource;
use App\Models\Node;
use App\Models\NodeHardware;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateController extends Controller
{
    /**
     * @param Request $request
     * @param Node $node
     * @return NodeHardwareResource
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function __invoke(Request $request, Node $node) : NodeHardwareResource
    {
        $this->authorize('owns-node', $node);

        $this->validate($request, [
        ]);

        /** @var NodeHardware $hardware */
        $hardware = $node->hardware;

        $hardware->update([
        ]);

        return new NodeHardwareResource($hardware);
    }
}

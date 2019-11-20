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
            'hostname' => ['sometimes', 'nullable', 'string'],
            'hostid' => ['sometimes', 'nullable', 'string'],
            'uptime' => ['sometimes', 'nullable', 'numeric'],
            'os' => ['sometimes', 'nullable', 'string'],
            'platform' => ['sometimes', 'nullable', 'string'],
            'platformFamily' => ['sometimes', 'nullable', 'string'],
            'platformVersion' => ['sometimes', 'nullable', 'string'],
            'kernelVersion' => ['sometimes', 'nullable', 'string'],
            'kernelArch' => ['sometimes', 'nullable', 'string'],
        ]);

        /** @var NodeHardware $hardware */
        $hardware = $node->hardware;

        $hardware->update([
            'hostname' => $request->input('hostname'),
            'hostid' => $request->input('hostid'),
            'os' => $request->input('os'),
            'os_platform' => $request->input('platform'),
            'os_platform_family' => $request->input('platformFamily'),
            'os_platform_version' => $request->input('platformVersion'),
            'kernel_version' => $request->input('kernelVersion'),
            'kernel_arch' => $request->input('kernelArch'),
        ]);

        return new NodeHardwareResource($hardware);
    }
}

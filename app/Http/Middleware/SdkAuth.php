<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Node;
use Closure;
use Illuminate\Http\Request;

class SdkAuth
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->has('token')) {
            throw new \Exception();
        }

        /** @var Node|null $node */
        $node = Node::where('auth_token', $request->get('token'))->get();

        if ($node === null) {
            throw new \Exception('node not foud');
        }

        $request->attributes->set(Node::class, $node);
        return $next($request);
    }
}

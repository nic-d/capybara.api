<?php

declare(strict_types=1);

namespace App\Http\Controllers\NodeEvent;

use App\Http\Controllers\Controller;
use App\Models\Node;
use App\Models\NodeEvent;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Request $request, NodeEvent $nodeEvent)
    {

    }
}

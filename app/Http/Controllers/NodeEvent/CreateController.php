<?php

declare(strict_types=1);

namespace App\Http\Controllers\NodeEvent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        Log::info(json_encode($request->all()));

        return response()->json([
            'error' => false,
        ]);
    }
}

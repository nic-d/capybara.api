<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NodeEventResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'uuid' => $this->uuid,

            'cpu' => [
                'user' => $this->cpu_user,
                'system' => $this->cpu_system,
                'idle' => $this->cpu_idle,
            ],

            'memory' => [
                'total' => $this->memory_total,
                'available' => $this->memory_available,
                'used' => $this->memory_used,
                'used_percent' => $this->memory_used_percent,
            ],

            'disk' => [
                'path' => $this->disk_path,
                'total' => $this->disk_total,
                'free' => $this->disk_free,
                'used' => $this->disk_used,
                'used_percent' => $this->disk_used_percent,
            ],

            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NodeHardwareResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'uuid' => $this->uuid,

            'hostname' => $this->hostname,
            'hostid' => $this->hostid,

            'os' => [
                'platform' => $this->os_platform,
                'platform_family' => $this->os_platform_family,
                'platform_version' => $this->os_platform_version,
            ],

            'kernel' => [
                'version' => $this->kernel_version,
                'kernel_arch' => $this->kernel_arch,
            ],

            'cpu' => [
                'vendor_id' => $this->cpu_vendor_id,
                'family' => $this->cpu_family,
                'model_name' => $this->cpu_model_name,
                'cores' => $this->cpu_cores,
                'mhz' => $this->cpu_mhz,
            ],

            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}

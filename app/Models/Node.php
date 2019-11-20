<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Node extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $fillable = [
//        'id',
//        'uuid',
//        'user_id',
        'auth_token',
//        'created_at',
//        'updated_at',
//        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @return Relations\BelongsTo
     */
    public function user() : Relations\BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    /**
     * @return Relations\HasOne
     */
    public function hardware() : Relations\HasOne
    {
        return $this->hasOne(
            NodeHardware::class,
            'node_id',
            'id'
        );
    }

    /**
     * @return Relations\HasMany
     */
    public function events() : Relations\HasMany
    {
        return $this->hasMany(
            NodeEvent::class,
            'node_id',
            'id',
        );
    }
}

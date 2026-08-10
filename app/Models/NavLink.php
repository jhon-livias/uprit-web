<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NavLink extends Model
{
    protected $fillable = [
        'group_id',
        'parent_id',
        'label',
        'route_name',
        'url',
        'external',
        'visible',
        'visible_desktop',
        'visible_mobile',
        'orden',
    ];

    protected $casts = [
        'external' => 'boolean',
        'visible' => 'boolean',
        'visible_desktop' => 'boolean',
        'visible_mobile' => 'boolean',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(NavGroup::class, 'group_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(NavLink::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(NavLink::class, 'parent_id')->orderBy('orden');
    }
}

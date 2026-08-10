<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NavGroup extends Model
{
    protected $fillable = [
        'key',
        'label',
        'tipo',
        'academic_nivel',
        'informes_key',
        'css_class',
        'show_in_main_nav',
        'show_in_topbar',
        'visible',
        'visible_desktop',
        'visible_mobile',
        'orden',
        'meta',
    ];

    protected $casts = [
        'show_in_main_nav' => 'boolean',
        'show_in_topbar' => 'boolean',
        'visible' => 'boolean',
        'visible_desktop' => 'boolean',
        'visible_mobile' => 'boolean',
        'meta' => 'array',
    ];

    public function links(): HasMany
    {
        return $this->hasMany(NavLink::class, 'group_id')->orderBy('orden');
    }

    public function isAcademic(): bool
    {
        return $this->tipo === 'academic';
    }

    public function isEditableLinks(): bool
    {
        return in_array($this->tipo, ['section', 'platform', 'topbar'], true);
    }
}

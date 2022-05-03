<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'active'
    ];

    /**
     * The companies that belong to the module
     */
    public function companies() {

        return $this->belongsToMany( Company::class, 'company_user', 'module_id', 'company_id' );

    }

    public function scopeActive( $query ) {

        return $query->where( 'active', 1 );

    }
}
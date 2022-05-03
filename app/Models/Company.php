<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Module;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'comments',
        'active',
        'logo',
    ];

    /**
     * The users that belong to the company
     */
    public function users() {

        return $this->belongsToMany( User::class, 'company_user', 'company_id', 'user_id' );

    }

    /**
     * The modules that belong to the company
     */
    public function modules() {

        return $this->belongsToMany( Module::class, 'company_module', 'company_id', 'module_id' );

    }

    public function scopeActive( $query ) {

        return $query->where( 'active', 1 );

    }
}

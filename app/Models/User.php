<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\TenantScopeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, TenantScopeTrait;

    protected $fillable = [
        'name', 'password', 'remember_token', 'code',
        'tenant_id',
        'gender',
        'cpf',
        'rg',
        'rg_expedition',
        'birthday',
        'naturalness',
        'civil_status',
        'avatar',  
        //Address      
        'postcode', 'street', 'number', 'complement', 'neighborhood', 'state', 'city',
        //Contact
        'phone', 'cell_phone', 'whatsapp', 'skype', 'telegram', 'email', 'additional_email',
        //Social
        'facebook', 'twitter', 'instagram',
        //Function
        'admin', 'client', 'editor', 'superadmin',
        'status',
        'information'
    ];

    protected $with = ['tenant'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationships
    */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}

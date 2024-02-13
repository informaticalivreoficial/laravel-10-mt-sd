<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'status',
        'init_date',
        'slug',
        'cnpj',
        'ie',
        'domain',
        'subdomain',
        'template',
        //Images
        'logo', 'logo_admin', 'logo_footer', 'favicon', 'metaimg', 'imgheader', 'watermark',
        //Contact
        'phone', 'cell_phone', 'whatsapp', 'skype', 'telegram', 'email', 'additional_email',
        //Address
        'postcode', 'street', 'number', 'complement', 'neighborhood', 'state', 'city',
        //Social links
        'facebook', 'twitter', 'instagram', 'youtube', 'linkedin',
        'information',
    ];

    /**
     * Relationships
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

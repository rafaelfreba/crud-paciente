<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $fillable = [
        'ibge',
        'name',
        'fu'
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}

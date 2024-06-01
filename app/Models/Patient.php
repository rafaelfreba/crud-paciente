<?php

namespace App\Models;

use App\Casts\CnsCast;
use App\Casts\CpfCast;
use App\Casts\PhoneCast;
use App\Casts\DateToBRCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'cns',
        'name',
        'birth',
        'email',
        'phone',
        'county_id'
    ];
    

    protected function casts(): array
    {
        return [
            'cpf' => CpfCast::class,
            'birth' => DateToBRCast::class,
            'cns' => CnsCast::class,
            'phone' => PhoneCast::class
        ];
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}

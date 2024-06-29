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

    public function getPatientsBirth2000()
    {
        $dates = ['2000-01-01'];

        return collect($dates)->map(function ($date) {
            $after2k = self::where('birth', '>=', $date)->count();
            $before2k = self::where('birth', '<', $date)->count();

            return [
                'Antes 2000' => $after2k,
                'Depois 2000' => $before2k,
            ];
        })->first();
    }
}

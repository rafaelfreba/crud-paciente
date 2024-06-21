<?php

namespace App\Exports;

use App\Models\Patient;
use App\Http\Resources\PatientCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PatientsExport implements FromCollection, WithHeadings, WithStyles
{
    public function headings(): array
    {
        return [
            'cpf',
            'cns',
            'nome',
            'dn',
            'email',
            'telefone',
            'municipio'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function collection()
    {
        $patients = Patient::with('county');
        
        if (request()->filled('search')) {
            $patients->where('cpf', request()->search)
                ->orWhere('cns', request()->search)
                ->orWhere('name', 'like', '%' . request()->search . '%')
                ->orWhere('birth', request()->search)
                ->orWhere('email', request()->search)
                ->orWhere('phone', request()->search)
                ->orWhereHas('county', function ($query) {
                    $query->where('name', 'like', '%' . request()->search . '%');
                });
        }        

        return new PatientCollection($patients->get());
    }
}

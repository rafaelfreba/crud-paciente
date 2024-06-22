<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class ChartControlller extends Controller
{
    public function chartBirth(Patient $patients)
    {
        $dates = ['2000-01-01'];
        $data = collect($dates)->map(function ($date) {
            $after2k = Patient::where('birth', '>=', $date)->count();
            $before2k = Patient::where('birth', '<', $date)->count();

            return [
                'Antes 2000' => $after2k,
                'Depois 2000' => $before2k,
            ];
        })->first();

        $chart = app()
            ->chartjs->name("patients")
            ->type("bar")
            ->size(["width" => 400, "height" => 200])
            ->datasets([
                [
                    "label" => "Total nascidos",
                    "backgroundColor" => ['#ff6384', '#36a2eb'],
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    "data" => $data
                ]
            ])->options([
                'plugins' => [
                    'legend' => [
                        'display' => false,
                    ]
                ]
            ]);

        return view('patients.chart', compact('chart'));
    }
}

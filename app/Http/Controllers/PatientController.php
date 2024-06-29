<?php

namespace App\Http\Controllers;

use App\DataObjects\ChartData;
use App\Exports\PatientsExport;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Http\Traits\Chart;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel as Excel;

class PatientController extends Controller
{
    use Chart;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $patients = Patient::with('county');

        if ($request->filled('search')) {
            $patients->where('cpf', $request->search)
                ->orWhere('cns', $request->search)
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('birth', $request->search)
                ->orWhere('email', $request->search)
                ->orWhere('phone', $request->search)
                ->orWhereHas('county', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                });
        }

        $request->filled('id') ? $patients->findOrFail($request->id) : '';


        return view('patients.index', [
            'patients' => $patients->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $patient = Patient::create($request->safe()->all());

        return redirect()->route('patients.index', ['id' => $patient->id])->withSuccess('Paciente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', [
            'patient' => $patient->load('county')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->safe()->all());

        return redirect()->route('patients.index', ['id' => $patient->id])->withSuccess('Paciente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect('patients')->withSuccess('Paciente apagado com sucesso!');
    }

    public function pdf(Patient $patient)
    {
        $pdf = Pdf::loadView('patients.pdf', ['data' => $patient->load('county')]);

        return $pdf->stream($patient->name . ".pdf");
    }

    public function export()
    {
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }

    public function chart(Patient $patients)
    {
        $chartData = new ChartData('patients', 'bar', $patients->getPatientsBirth2000(), 'Pacientes nascidos antes e depois de 2000');

        $chart = self::getChart($chartData);

        return view("patients.chart", compact("chart"));
    }

    public function upload(Request $request)
    {
        if ($request->hasfile('file')) {

            $uploadPath = storage_path('app/public');

            $file = $request->file('file');

            $extention = $file->getClientOriginalExtension();
            $filename = time() . '-' . rand(0, 99) . '.' . $extention;
            $file->move($uploadPath, $filename);

            //buscando o paciente para atualizar a foto
            $patient = Patient::where('id', $request->patient_id)->first();
            //se existe foto apaga a antiga
            if (File::exists(storage_path('app/public/' . $patient->foto))) {
                File::delete(storage_path('app/public/' . $patient->foto));
            }
            //guarda a foto
            $patient->foto = $filename;
            $patient->update();

            return response()->json(['success' => 'Foto salva com sucesso']);
        }

        return response()->json(['error' => 'Falha no upload do arquivo.']);
    }
}

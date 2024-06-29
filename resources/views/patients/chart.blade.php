@extends('layouts.app')

@section('title', 'Gráficos dos Pacientes')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Gráfico dos Pacientes</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 border shadow p-3 mb-5 bg-body rounded">
                    {{ $chart->render() }}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('patients.index') }}" class="btn btn-danger">Voltar</a>
        </div>
    </div>    
@endsection

@extends('layouts.app')

@section('title', 'Gráfico Pacientes Nascidos Antes e Depois de 2000')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Gráfico Pacientes Nascidos Antes e Depois de 2000</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    {{ $chart->render() }}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('patients.index') }}" class="btn btn-danger">Voltar</a>
        </div>
    </div>
@endsection

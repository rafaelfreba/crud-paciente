@extends('layouts.app')

@section('title', 'Detalhe do Paciente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalhe do Paciente {{ $patient->name }}</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Foto: </li>
                <li class="list-group-item">ID: {{ $patient->id }}</li>
                <li class="list-group-item">CPF: {{ $patient->cpf }}</li>
                <li class="list-group-item">CNS: {{ $patient->cns }}</li>
                <li class="list-group-item">NOME: {{ $patient->name }}</li>
                <li class="list-group-item">DN: {{ $patient->birth }}</li>
                <li class="list-group-item">E-MAIL: {{ $patient->email }}</li>
                <li class="list-group-item">TELEFONE: {{ $patient->phone }}</li>
                <li class="list-group-item">MUNICÍPIO: {{ "({$patient->county->ibge}) {$patient->county->name}/{$patient->county->fu}" }}</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('patients.index') }}" class="btn btn-danger">Voltar</a>
        </div>
    </div>    
@endsection

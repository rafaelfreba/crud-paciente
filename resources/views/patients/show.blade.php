@extends('layouts.app')

@section('title', 'Detalhar Paciente')

@section('content')
    <div class="card mt-5 table-responsive">
        <div class="card-body">
            <h4>Detalhes do Paciente {{ $patient->name }}</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <img src="{{ asset($patient->avatar) }}" alt="foto_do_paciente" class="border rounded-circle" @style('width: 80px; height: 80px')/>
                </li>
                <li class="list-group-item">ID: {{ $patient->id }}</li>
                <li class="list-group-item">CPF: {{ $patient->cpf }}</li>
                <li class="list-group-item">CNS: {{ $patient->cns }}</li>
                <li class="list-group-item">NOME: {{ $patient->name }}</li>
                <li class="list-group-item">DN: {{ $patient->birth }}</li>
                <li class="list-group-item">E-MAIL: {{ $patient->email }}</li>
                <li class="list-group-item">TELEFONE: {{ $patient->phone}}</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('patients.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('patients.index') }}" class="btn btn-danger">Voltar</a>
        </div>
    </div>
@endsection

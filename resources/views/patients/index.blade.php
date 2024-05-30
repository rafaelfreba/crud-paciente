@extends('layouts.app')

@section('title', 'CRUD-PACIENTE')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Lista de Pacientes</h5>
            <table class="table">
                <thead>
                  <tr>
                    {{-- <th scope="col">ID</th> --}}
                    <th scope="col">CPF</th>
                    <th scope="col">CNS</th>
                    <th scope="col">NOME</th>
                    <th scope="col">DN</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">MUNICÍPIO</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <tr>
                        {{-- <th>{{ $patients['id'] }}</th> --}}
                        <th>{{ $patients['cpf'] }}</th>
                        <th>{{ $patients['cns'] }}</th>
                        <th>{{ $patients['name'] }}</th>
                        <th>{{ $patients['birth'] }}</th>
                        <th>{{ $patients['email'] }}</th>
                        <th>{{ $patients['phone'] }}</th>
                        <th>{{ $patients['county_id'] }}</th>
                    </tr>
                 
                </tbody>
              </table>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('title', 'Lista de Pacientes')

@section('content')
    <div class="card mt-5 table-responsive">
        <div class="card-body">
            <h5 class="card-title">Lista de Pacientes</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CPF</th>
                        <th scope="col">CNS</th>
                        <th scope="col">NOME</th>
                        <th scope="col">DN</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">TELEFONE</th>
                        <th scope="col">MUNICÍPIO</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $patient->cpf }}</td>
                            <td>{{ $patient->cns }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->birth }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ "{$patient->county->name}/{$patient->county->fu}" }}</td>
                            <td>
                                <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('patients.destroy', $patient) }}" method="POST" @style('display: inline-block')>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-danger">Nenhum registro encontrado!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('patients.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('home') }}" class="btn btn-danger">Voltar</a>
        </div>
        <div class="card-footer">
          {{ $patients->links() }}
        </div>
    </div>
@endsection


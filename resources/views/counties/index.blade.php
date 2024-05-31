@extends('layouts.app')

@section('title', 'Lista de Municípios')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Lista de Municípios</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">IBGE</th>
                        <th scope="col">NOME</th>
                        <th scope="col">UF</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($counties as $county)
                        <tr>
                            <th scope="row">{{ $county->id }}</th>
                            <td>{{ $county->ibge }}</td>
                            <td>{{ $county->name }}</td>
                            <td>{{ $county->fu }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-danger">Nenhum registro encontrado!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success">Novo</a>
            <a href="{{ route('home') }}" class="btn btn-danger">Voltar</a>
        </div>
        <div class="card-footer">
          {{ $counties->links() }}
        </div>
    </div>
@endsection

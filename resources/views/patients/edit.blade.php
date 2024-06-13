@extends('layouts.app')

@section('title', 'Editar paciente')

@section('content')

    @inject('resource', 'App\Http\Resources\Resources')

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Editar paciente</h5>
            <div class="row">
                <div class="col-md-12">
                    <label>Foto</label>
                    @if ($patient->foto)
                        <img src="{{ asset('storage/fotos') . '/' . $patient->foto }}" alt="foto do paciente"
                            class="rounded-circle" @style('width: 200px; height: 200px') />
                    @else
                        <img src="{{ asset('images/' . mt_rand(1,9) . '.png') }}" alt="avatar do paciente" class="rounded-circle"
                            @style('width: 200px; height: 200px') />
                    @endif
                    <form action="{{ route('patients.upload') }}" method="POST" enctype="multipart/form-data"
                        class="dropzone float-end" id="myDragAndDropUploader">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                    </form>
                    <h5 id="message" class="float-end"></h5>
                </div>
            </div>
            <form action="{{ route('patients.update', $patient) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-3 my-1">
                        <input type="text" name="cpf" id="cpf" class="form-control cpf"
                            value="{{ old('cpf', $patient->cpf) }}" placeholder="CPF">
                    </div>
                    <div class="form-group col-3">
                        <input type="text" name="cns" id="cns" class="form-control cns"
                            value="{{ old('cns', $patient->cns) }}" placeholder="CNS">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $patient->name) }}" placeholder="NOME">
                    </div>
                    <div class="form-group col-4">
                        <input type="date" name="birth" id="birth" class="form-control"
                            value="{{ old('birth', $patient->getRawOriginal('birth')) }}" placeholder="DATA DE NASCIMENTO">
                    </div>
                    <div class="form-group col-4">
                        <input type="text" name="email" id="email" class="form-control"
                            value="{{ old('email', $patient->email) }}" placeholder="E-MAIL">
                    </div>
                    <div class="form-group col-4">
                        <input type="text" name="phone" id="phone" class="form-control phone"
                            value="{{ old('phone', $patient->phone) }}" placeholder="TELEFONE">
                    </div>
                    <div class="form-group col-4 my-1">
                        <select name="county_id" class="form-select">
                            <option selected></option>
                            @foreach ($resource->getCounties() as $county)
                                <option value="{{ $county->id }}" @selected(old('county_id', $patient->county_id) == $county->id)>
                                    {{ $county->name . '/' . $county->fu }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{ route('patients.index') }}" class="btn btn-danger">Voltar</a>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        var maxFilesizeVal = 1;
        var maxFilesVal = 1;

        // Note that the name "myDragAndDropUploader" is the camelized id of the form.
        Dropzone.options.myDragAndDropUploader = {

            paramName: "file",
            maxFilesize: maxFilesizeVal, // MB
            maxFiles: maxFilesVal,
            resizeQuality: 1.0,
            acceptedFiles: ".jpg,.png",
            addRemoveLinks: false,
            timeout: 60000,
            dictDefaultMessage: "Solte seus arquivos aqui ou clique para fazer upload",
            dictFallbackMessage: "Seu navegador não suporta uploads de arquivos arrastando e soltando.",
            dictFileTooBig: "O arquivo é muito grande. Tamanho máximo do arquivo: " + maxFilesizeVal + "MB.",
            dictInvalidFileType: "Tipo de arquivo inválido. Somente arquivos JPG e PNG são permitidos.",
            dictMaxFilesExceeded: "Você só pode fazer upload até " + maxFilesVal + " arquivos.",
            maxfilesexceeded: function(file) {
                this.removeFile(file);
                // this.removeAllFiles();
            },
            sending: function(file, xhr, formData) {
                $('#message').text('Upload de imagens...');
            },
            success: function(file, response) {
                $('#message').text(response.success);
            },
            error: function(file, response) {
                $('#message').text('Algo deu errado! ' + response);
                return false;
            }
        };
    </script>
@endsection

@extends('layouts.app')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('colaborador.store') }}" method="POST">
                    @csrf
                    <div class="conteudo-form">
                        <div class="card">
                            <div class="card-header">
                                Formulário de Cadastro de Colaboradores
                            </div>

                            <div class="card-body bg-white">
                                <p>Os campos com * são obrigatórios</p>
                                <div class="row g-3 mb-3">
                                    {{-- NOME --}}
                                    <div class="col-12 col-sm-6 col-md-8">
                                        <label for="nome" class="form-label">Nome*</label>
                                        <input type="text"
                                            class="form-control
                                            @error('nome') is-invalid @enderror"
                                            name="nome" id="nome" placeholder="Nome Completo"
                                            value="{{ old('nome') }}" required>
                                        @error('nome')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Cargo --}}
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <label for="cargo" class="form-label">Cargo*</label>
                                        <input type="text"
                                            class="form-control
                                            @error('cargo') is-invalid @enderror"
                                            name="cargo" id="cargo" placeholder="Cargo" value="{{ old('cargo') }}"
                                            required>
                                        @error('cargo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    {{-- Telefone --}}
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <label for="telefone" class="form-label">Telefone*</label>
                                        <input type="text"
                                            class="form-control
                                            @error('telefone') is-invalid @enderror"
                                            name="telefone" id="telefone" placeholder="(00) 00000-0000"
                                            pattern="\(\d{2}\) \d{4,5}-\d{4}" value="{{ old('telefone') }}"
                                            title="Digite um telefone no formato (99) 99999-9999" required>
                                        @error('telefone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-12 col-sm-6 col-md-8">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email"
                                            class="form-control
                                            @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="nome@exemplo.com"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    {{-- Logaradouro --}}
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <label for="logradouro" class="form-label">Logradouro*</label>
                                        <input type="text"
                                            class="form-control
                                            @error('logradouro') is-invalid @enderror"
                                            name="logradouro" id="logradouro" placeholder="Logradouro"
                                            value="{{ old('logradouro') }}" required>
                                        @error('logradouro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Numero --}}
                                    <div class="col-12 col-sm-4 col-md-3">
                                        <label for="numero" class="form-label">Número*</label>
                                        <input type="text"
                                            class="form-control
                                            @error('numero') is-invalid @enderror"
                                            name="numero" id="numero" placeholder="Número" value="{{ old('numero') }}"
                                            required>
                                        @error('numero')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    {{-- Municipio --}}
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <label for="municipio" class="form-label">Município*</label>
                                        <input type="text"
                                            class="form-control
                                            @error('municipio') is-invalid @enderror"
                                            name="municipio" id="municipio" placeholder="Município"
                                            value="{{ old('municipio') }}" required>
                                        @error('municipio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Estado --}}
                                    <div class="col-12 col-sm-4 col-md-3">
                                        <label for="estado" class="form-label">Estado*</label>
                                        <input type="text" class="form-control @error('estado') is-invalid @enderror"
                                            name="estado" id="estado" placeholder="Estado" value="{{ old('estado') }}"
                                            pattern=".{2}" title="O campo deve conter exatamente 2 caracteres"
                                            maxlength="2" required>
                                        @error('estado')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="col-auto">
                                    <a href="{{ route('colaborador.list') }}" class="btn btn-secondary me-2">Listar Colaboradores</a>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

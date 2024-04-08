@extends('layouts.app')

@section('template_title')
    {{ $diario->name ?? __('Show') . " " . __('Diario') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Diario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('diarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Titulo:</strong>
                            {{ $diario->titulo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Contenido:</strong>
                            {{ $diario->contenido }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Creacion:</strong>
                            {{ $diario->fecha_creacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Categoria Id:</strong>
                            {{ $diario->categoria_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Usuario Id:</strong>
                            {{ $diario->usuario_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

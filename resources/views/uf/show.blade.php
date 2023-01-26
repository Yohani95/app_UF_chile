@extends('layouts.app')

@section('template_title')
    {{ $uf->name ?? 'Show Uf' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Uf</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ufs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombreindicador:</strong>
                            {{ $uf->nombreIndicador }}
                        </div>
                        <div class="form-group">
                            <strong>Codigoindicador:</strong>
                            {{ $uf->codigoIndicador }}
                        </div>
                        <div class="form-group">
                            <strong>Unidadmedidaindicador:</strong>
                            {{ $uf->unidadMedidaIndicador }}
                        </div>
                        <div class="form-group">
                            <strong>Valorindicador:</strong>
                            {{ $uf->valorIndicador }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaindicador:</strong>
                            {{ $uf->fechaIndicador }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

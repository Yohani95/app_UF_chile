<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombreIndicador') }}
            {{ Form::text('nombreIndicador', $uf->nombreIndicador, ['class' => 'form-control' . ($errors->has('nombreIndicador') ? ' is-invalid' : ''), 'placeholder' => 'Nombreindicador']) }}
            {!! $errors->first('nombreIndicador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigoIndicador') }}
            {{ Form::text('codigoIndicador', $uf->codigoIndicador, ['class' => 'form-control' . ($errors->has('codigoIndicador') ? ' is-invalid' : ''), 'placeholder' => 'Codigoindicador']) }}
            {!! $errors->first('codigoIndicador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unidadMedidaIndicador') }}
            {{ Form::text('unidadMedidaIndicador', $uf->unidadMedidaIndicador, ['class' => 'form-control' . ($errors->has('unidadMedidaIndicador') ? ' is-invalid' : ''), 'placeholder' => 'Unidadmedidaindicador']) }}
            {!! $errors->first('unidadMedidaIndicador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valorIndicador') }}
            {{ Form::text('valorIndicador', $uf->valorIndicador, ['class' => 'form-control' . ($errors->has('valorIndicador') ? ' is-invalid' : ''), 'placeholder' => 'Valorindicador']) }}
            {!! $errors->first('valorIndicador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaIndicador') }}
            {{ Form::text('fechaIndicador', $uf->fechaIndicador, ['class' => 'form-control' . ($errors->has('fechaIndicador') ? ' is-invalid' : ''), 'placeholder' => 'Fechaindicador']) }}
            {!! $errors->first('fechaIndicador', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
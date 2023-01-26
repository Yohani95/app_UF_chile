@extends('layouts.app')

@section('template_title')
    Uf
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Uf') }}
                            </span>

                            <div class="float-right">
                                <button href="" class="btn btn-success btn-sm float-right" onclick="getUF()"
                                    data-placement="left">
                                    {{ __('Obtener Datos de Api') }}
                                </button>
                                <a href="{{ route('ufs.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombreindicador</th>
                                        <th>Codigoindicador</th>
                                        <th>Unidadmedidaindicador</th>
                                        <th>Valorindicador</th>
                                        <th>Fechaindicador</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ufs as $uf)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $uf->nombreIndicador }}</td>
                                            <td>{{ $uf->codigoIndicador }}</td>
                                            <td>{{ $uf->unidadMedidaIndicador }}</td>
                                            <td>{{ $uf->valorIndicador }}</td>
                                            <td>{{ $uf->fechaIndicador }}</td>

                                            <td>
                                                <form action="{{ route('ufs.destroy', $uf->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('ufs.show', $uf->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('ufs.edit', $uf->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>            
                    </div>
                </div>         
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        function getUF() {
            $.ajax({
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'getuf',
                dataType: "json",
                contentType: 'application/json; charset=utf-8',
                error: function(data) {
                    console.log(data);
                },
                success: function(data) {
                    console.log("result: " + data)
                    if (data == 500) {
                        console.log(data)
                    } else {
                        console.log(data)
                        console.log(data)
                    }
                }
            });
        }
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Graficos UF') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-sm-12 center text-center" style="max-width:1200px; margin:auto;">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="card-title card-header">Grafico UF<span> </span>
                    </div>
                    <div>
                        Desde:<input class="m-2 form-control" type="date" name="desde" id="desde" required> Hasta
                        <input class="m-2 form-control" type="date" name="hasta" id="hasta" required>
                        <button type="button" onclick="getData()"
                            class="btn btn-success btn-sm float-right">Buscar</button>
                    </div>
                    <canvas id="ufChart" width="800" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script>
        let myChart=null;
        function FillChart(data) {
            var arrayName = [];
            var arrayValue = [];
            data.forEach((value, index, array) => {
                arrayName.push(value.fechaIndicador)
                arrayValue.push(value.valorIndicador)
            })
            console.log(arrayName)
            const ctx = document.getElementById('ufChart');
            if (myChart!=null) {
                myChart.destroy();
            }
            myChart = new Chart(ctx, {
                type: 'line',
                destroy: true,
                data: {
                    labels: arrayName,
                    datasets: [{
                        label: ['UNIDAD DE FOMENTO (UF) '],
                        data: arrayValue,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }, ]
                },

            });
        }

        function getData() {
            try {
                return new Promise(resolve => {
                    var desde = document.getElementById('desde').value
                    var hasta = document.getElementById('hasta').value
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: 'getuf',
                        dataType: "text",
                        data: {
                            desde,
                            hasta
                        },

                        error: function(data) {},
                        success: function(data) {
                            if(data!=null){
                                data = JSON.parse(data)
                                FillChart(data)
                            }else{

                            }
                        }
                    })
                })
            } catch (error) {

            }

        }
    </script>
@endsection

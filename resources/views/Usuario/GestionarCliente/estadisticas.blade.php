@extends('layout')

@section('content')
    <br>
    <h2>Clientes por país</h2>
    <hr>
    <br>
    <div class="container" style="width: 50%">
        <canvas id = "myChart" width="400" height="400"></canvas>
    </div>

    <script>
        let listaDoc = @json($listaClientes);
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart( ctx, {
            type: "pie", 
            data: {
                labels: ['Bolivia', 'otros'],
                datasets: [{
                    label: 'Clientes por país',
                    data: listaDoc,
                    backgroundColor:[
                        'rgb(66, 134, 244,0.5)',
                        'rgb(74, 135, 72,0.5)',
                    ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }

        });
    </script>

@endsection()
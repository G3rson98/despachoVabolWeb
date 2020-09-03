@extends('layout')

@section('content')
    <br>
    <h2>Accesos al sistema </h2>
    <hr>
    <br>
    <div class="container" style="width: 50%">
        <canvas id = "myChart" width="400" height="400"></canvas>
    </div>

    <script>
        let listaDoc = @json($listaAbogados);
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart( ctx, {
            type: "pie", 
            data: {
                labels: ['Administrador', 'Abogado', 'Cliente'],
                datasets: [{
                    label: 'Cantidad de accesos al sistema',
                    data: listaDoc,
                    backgroundColor:[
                        'rgb(66, 134, 244,0.5)',
                        'rgb(74, 135, 72,0.5)',
                        'rgb(229, 89, 50,0.5)',                         
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
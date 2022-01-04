<<<<<<< HEAD
<?php require 'layouts/loader.php'; ?>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <?php require 'layouts/header.php'; ?>
    <section>
        <?php require 'layouts/nav.php'; ?>
    </section>
    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <form id="form">
                <div class='container'>
                    <div class="row">
                        <div class="col-4 my-auto mx-auto">
                            <input type="radio" onclick="grafico(0)" id="bar" name="tipo" value="bar">
                            <label for="bar">Barras</label><br>
                        </div>
                        <div class="col-4 my-auto mx-auto">
                            <input type="radio" onclick="grafico(1)" id="line" name="tipo" value="line">
                            <label for="line">Lineas</label><br>
                        </div>
                        <div class="col-4 my-auto mx-auto">
                            <input type="radio" onclick="grafico(2)" id="pie" name="tipo" value="pie">
                            <label for="pie">Circulo</label>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
                <div class="">
                    <canvas id="MiGrafica" width="400" height="300">El mensaje se mostrara si no carga</canvas>
                </div>
            </div>
        </div>
    </section>
    <!-- ./CONTENT -->

    <script>
        //configuraciones
        const data = {
                labels: ['GRUPO1','GRUPO2','GRUPO3','GRUPO4','GRUPO5'],
                datasets: [
                    {
                        label: 'Mi grafica de ventas',
                        backgroundColor:["rgb(153,204,255)",
                                        "rgb(153,204,200)",
                                        "rgb(0,255,255)"],
                        borderColor:'rgb(0,255,0)',
                        data:[12,5,3,15,6],
                        borderWidth: 1
                    }
                ]
        };

        const config = {
            type: "pie",
            data,
            options: {
                scales:{
                    yAxes:[{
                        tcks:{beginAtZero:true}
                    }]
                },
                padding: {
                    left: 10
                },
                plugins: {
            subtitle: {
                display: true,
                text: 'Hola soy un subtitulo'
                    }
                 }
            }
        };

        let chartVar = document.querySelector("#MiGrafica").getContext('2d');
        let chart = new Chart(chartVar,config );

        function grafico(a){
            if (a == 0) {
                //chart.config.data.labels[1] = "PRUEBA MODIFICACION"
                chart.config.type = "bar"
                chart.update();
            }
            if (a == 1) {
                chart.config.type = "line"
                chart.update();
            }
            if (a == 2) {
                chart.config.type = "pie"
                chart.update();
            }
        }

    </script>
=======
Hola Mundo
>>>>>>> master

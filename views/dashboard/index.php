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
                <div class="">
                    <canvas id="MiGrafica" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </section>
    <!-- ./CONTENT -->

    <script>
        let chartVar = document.querySelector("#MiGrafica").getContext('2d');

        let chart = new Chart(chartVar, {
            type: 'line',//line, radar, bar
            data: {
                labels: ['Vino','Tequila','Cerveza','Ron'],
                datasets: [
                    {
                        label: 'Mi grafica de ventas',
                        backgroundColor:"rgb(0,0,0)",
                        borderColor:'rgb(0,255,0)',
                        data:[12,100,5,30]
                    }
                ]
            }
        });
    </script>
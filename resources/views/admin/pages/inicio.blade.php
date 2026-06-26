<?php
$dash = 'Dashboard';
$subt = 'DASHBOARD';

date_default_timezone_set('America/Lima');

$mes = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'][date('n') - 1];
?>

@include('admin.layouts._header')
@include('admin.layouts._menu')

<div class="row clearfix">

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body">
                <div class="number">
                    <h6 style="color: #f3784c;"><b>FACTURAS MENSUALES</b></h6>
                    <span>S/ 12,500</span>
                </div>
                <small class="text-muted">{{ $mes }}</small>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body">
                <div class="number">
                    <h6 style="color: #f3784c;"><b>BOLETAS MENSUALES</b></h6>
                    <span>S/ 8,200</span>
                </div>
                <small class="text-muted">{{ $mes }}</small>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body">
                <div class="number">
                    <h6 style="color: #f3784c;"><b>RECIBOS MENSUALES</b></h6>
                    <span>S/ 4,300</span>
                </div>
                <small class="text-muted">{{ $mes }}</small>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body">
                <div class="number">
                    <h6 style="color: #f3784c;"><b>VENTAS TOTALES</b></h6>
                    <span>S/ 25,000</span>
                </div>
                <small class="text-muted">{{ $mes }}</small>
            </div>
        </div>
    </div>

</div>

<div class="row clearfix">

    <div class="col-lg-4">
        <div class="card">
            <div class="header">
                <h2 style="color: #f3784c;">
                    <b>PRODUCTOS MÁS VENDIDOS</b>
                </h2>
            </div>

            <div class="body">
                <ul class="list-unstyled list-referrals">

                    <li>
                        <p>
                            <span class="value">120</span>
                            <span class="text-muted float-right">Laptop HP</span>
                        </p>
                    </li>

                    <li>
                        <p>
                            <span class="value">95</span>
                            <span class="text-muted float-right">Impresora Epson</span>
                        </p>
                    </li>

                    <li>
                        <p>
                            <span class="value">80</span>
                            <span class="text-muted float-right">Mouse Logitech</span>
                        </p>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">

            <div class="header">
                <h2 style="color: #f3784c;">
                    <b>RESUMEN DE VENTAS {{ $mes }}</b>
                </h2>
            </div>

            <div class="body">

                <div class="row text-center">

                    <div class="col-sm-3 col-6">
                        <h4 class="margin-0">S/ 1,200</h4>
                        <p class="text-muted margin-0">DÍA</p>
                    </div>

                    <div class="col-sm-3 col-6">
                        <h4 class="margin-0">S/ 6,500</h4>
                        <p class="text-muted margin-0">SEMANA</p>
                    </div>

                    <div class="col-sm-3 col-6">
                        <h4 class="margin-0">S/ 25,000</h4>
                        <p class="text-muted margin-0">MES</p>
                    </div>

                    <div class="col-sm-3 col-6">
                        <h4 class="margin-0">S/ 180,000</h4>
                        <p class="text-muted margin-0">AÑO</p>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@include('admin.layouts._scripts')

<script>
    const home = document.getElementById('home');

    if(home){
        home.classList.toggle('active');
    }
</script>
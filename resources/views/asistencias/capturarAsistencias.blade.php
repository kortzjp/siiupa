<!DOCTYPE html>
<html lang="es">
    <head>
        <title>SII UPAtlacomulco</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="icono/png" href="{{ asset('images/upa_logo.png')}}">
        <link rel="stylesheet" href="{{ asset('css/w3.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        </style>
    </head>
    <body class="w3-light-grey">

        <!-- Top container -->
        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
            <span class="w3-bar-item w3-right"><img src="{{ asset('images/upa_logo.png')}}" style="width:46px"> SII UPAtlacomulco</span>
        </div>

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container w3-row">
                <div class="w3-col s4">
                    <img src="https://www.w3schools.com/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
                </div>
                <div class="w3-col s8 w3-bar">
                    <br>
                    <span>Hola, <strong>{{ $profesor['nombre'] }}</strong></span>
                </div>
            </div>
            <hr>
            <div class="w3-container w3-green">
                <h5>MENU</h5>
            </div>
            <div class="w3-bar-block">
                <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="cerrar menu"><i class="fa fa-remove fa-fw"></i>  Cerrar Menu</a>
                <!--SERVICIOS-->
                @foreach( $serviciosWeb as $servicio )
                <a href="/{{$servicio->url}}" class="w3-bar-item w3-button w3-padding {{ $servicio->color}}">
                    <i class="{{$servicio->img_png}} fa-fw"></i>  {{$servicio->nombre}}</a>    
                <!--SERVICIOS-->
                @endforeach
            </div>
        </nav>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="cerrar menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-dashboard"></i> LISTAS DE ASISTENCIA </b></h5>
            </header>

            <div class="w3-container ">
                <p class="w3-card w3-padding">Selecciona un grupo para que se genere la lista PDF. </p>
                <div class="w3-responsive w3-white">
                    <table class="w3-table-all w3-card-4">
                        <tr class="w3-grey ">
                            <th class="w3-center">No.</th>
                            <th>MATRICULA</th>
                            <th>ALUMNO</th>
                            <th> {parcial} PARCIAL</th>
                        </tr>
                        <!--CALIFICACIONES-->
                        @foreach( $listaAlumnos as $alumno )
                        <tr class="{estilo}">
                            <td class="w3-center">{numero}</td>
                            <td>{nocuenta}</td>
                            <td>{{$alumno->nombre_alumno}}</td>
                            <td>{calificacion}</td>
                        </tr>
                        @endforeach
                        <!--CALIFICACIONES-->
                        <tr>
                            <td colspan="3">De clic en "CAPTURAR", sólo cuando este completamente seguro del resultado, después de capturar <b>no hay cambios</b>.</td>
                            <td>{boton}</td>
                        </tr>
                    </table>
                </div>
                <br>
            </div>


            <!-- Footer -->
            <footer class="w3-container w3-padding-16 w3-light-grey">
                <p><i style="font-size: 16px" class="fa">&#xf19c;</i>
                    Universidad Politécnica de Atlacomulco, 
                    Km. 5 Carretera Atlacomulco - San José Toxi, 
                    Santo Domingo Shomeje, Atlacomulco de Fabela, 
                    Estado de México. Tel. (712) 690 3020
                </p>
            </footer>

            <!-- End page content -->
        </div>

        <script>
            var mySidebar = document.getElementById("mySidebar");
            var overlayBg = document.getElementById("myOverlay");
            function w3_open() {
                if (mySidebar.style.display === 'block') {
                    mySidebar.style.display = 'none';
                    overlayBg.style.display = "none";
                } else {
                    mySidebar.style.display = 'block';
                    overlayBg.style.display = "block";
                }
            }
            function w3_close() {
                mySidebar.style.display = "none";
                overlayBg.style.display = "none";
            }
        </script>

    </body>
</html>

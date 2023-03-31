<!DOCTYPE html>
<html lang="es">
    <title>SII UPAtlacomulco</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="icono/png" href="{{ asset('/images/upa_logo.png')}} ">
    <link rel="stylesheet" href="{{ asset( 'css/w3.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" >

    <body>

        <!-- Header / Home-->
        <header class="w3-display-container " id="home">
            <div class="w3-bar w3-black w3-bottombar w3-border-red" style="height: 70px">
                <div class="w3-padding w3-display-left" > 
                    <img  src="{{ asset('/images/logo_edomex_upa.png') }}" style="width:40%" alt="UPA">
                </div>
                <div class="w3-padding w3-display-middle" > 
                    <h1 class="w3-center w3-text-white w3-xlarge w3-hide-medium w3-hide-small">SISTEMA INTEGRAL DE INFORMACIÓN UPAtlacomulco</h1>
                    <h1 class="w3-center w3-text-white w3-opacity-min w3-xlarge w3-hide-large"><b>&nbsp;&nbsp;&nbsp; SII UPA</b></h1>
                </div>
                <div class="w3-padding w3-display-right " > 
                    <img class="w3-right" src="{{ asset('/images/camaleon.png') }}" style="width:40%" alt="Camaleon">
                </div>
            </div>
        </header>

        <div class="container-portada">
            <div class="capa-gradient"></div>
            <div class="container-details">
                <div class="details"></div>
            </div>
        </div>


        <div class="w3-container">     
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                <h2 class="w3-center w3-large w3-gray w3-hide-small">ACCESO AL SISTEMA PARA ALUMNOS</h2>
                <h2 class="w3-center w3-small w3-gray w3-hide-medium w3-hide-large"><b>ACCESO AL SISTEMA PARA ALUMNOS</b></h2>
                @if( Session::get('fail'))<div class="w3-center w3-red">{{ Session::get('fail') }}</div>@endif
                <form class="w3-container" action="{{ route('alumnos.check')}}" method="post">
                    @csrf
                    <div class="w3-section">
                        <input class="w3-input w3-border w3-margin-bottom" type="text" name="nocuenta" placeholder="Usuario" autofocus required>
                        <input class="w3-input w3-border" type="password" name="password" placeholder="Contraseña" required>
                        @error('password')<span><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="w3-container w3-border-top w3-padding w3-light-grey w3-center">
                        <button class="w3-button w3-green " type="submit">ENTRAR</button>
                        <a href="/alumnos/exit" ><button class="w3-button w3-red " type="button" >SALIR</button></a>
                    </div>
                </form>
                <br>
            </div>
        </div>
        <br>

        <!-- Navbar (sticky bottom) -->
        <div class="w3-bottom">            
            <div class="w3-bar w3-green w3-center w3-padding-16 w3-opacity-min w3-hide-medium w3-hide-small">
                <p>Universidad Politécnica de Atlacomulco, 
                    Km. 5 Carretera Atlacomulco - San José Toxi, 
                    Santo Domingo Shomeje, Atlacomulco de Fabela, 
                    Estado de México. Tel. (712) 690 3020
                </p> 
            </div>
        </div>

        <div class="w3-bar w3-green w3-center w3-padding w3-opacity-min w3-hide-large w3-small">
            <p>Universidad Politécnica de Atlacomulco, 
                Km. 5 Carretera Atlacomulco - San José Toxi, 
                Santo Domingo Shomeje, Atlacomulco de Fabela, 
                Estado de México. Tel. (712) 690 3020
            </p> 
        </div>



    </body>
</html>
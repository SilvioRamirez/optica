<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>

{ 
    margin: 0; 
    padding: 0
} 

html { 
    height: 100%
} 

h2{ 
    color: #0da5b4; 
} 
#form { 
    text-align: center; 
    position: relative; 
    margin-top: 20px
} 

#form fieldset { 
    background: white; 
    border: 0 none; 
    border-radius: 0.5rem; 
    box-sizing: border-box; 
    width: 100%; 
    margin: 0; 
    padding-bottom: 20px; 
    position: relative
} 

.finish { 
    text-align: center
} 

#form fieldset:not(:first-of-type) { 
    display: none
} 

#form .previous-step, .next-step { 
    width: 100px; 
    font-weight: bold; 
    color: white; 
    border: 0 none; 
    border-radius: 0px; 
    cursor: pointer; 
    padding: 10px 5px; 
    margin: 10px 5px 10px 0px; 
    float: right
} 

.form, .previous-step { 
    background: #616161; 
} 

.form, .next-step { 
    background: #0da5b4; 
} 

#form .previous-step:hover, 
#form .previous-step:focus { 
    background-color: #000000
} 

#form .next-step:hover, 
#form .next-step:focus { 
    background-color: #0da5b4
} 

.text { 
    color: #0da5b4; 
    font-weight: normal
} 

#progressbar { 
    margin-bottom: 30px; 
    overflow: hidden; 
    color: lightgrey 
} 

#progressbar .active { 
    color: #0da5b4
} 

#progressbar li { 
    list-style-type: none; 
    font-size: 15px; 
    width: 25%; 
    float: left; 
    position: relative; 
    font-weight: 400
} 

#progressbar #step1:before { 
    content: "1"
} 

#progressbar #step2:before { 
    content: "2"
} 

#progressbar #step3:before { 
    content: "3"
} 

#progressbar #step4:before { 
    content: "4"
} 

#progressbar li:before { 
    width: 50px; 
    height: 50px; 
    line-height: 45px; 
    display: block; 
    font-size: 20px; 
    color: #ffffff; 
    background: lightgray; 
    border-radius: 50%; 
    margin: 0 auto 10px auto; 
    padding: 2px
} 

#progressbar li:after { 
    content: ''; 
    width: 100%; 
    height: 2px; 
    background: lightgray; 
    position: absolute; 
    left: 0; 
    top: 25px; 
    z-index: -1
} 

#progressbar li.active:before, 
#progressbar li.active:after { 
    background: #0da5b4
} 

.progress { 
    height: 20px
} 

.progress-bar { 
    background-color: #0da5b4
}


</style>
</head>

<body>



        <div id="app">
            {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                    <div class="px-0 pt-4 pb-0 mt-3 mb-3">

                        <form id="form">
                            <ul id="progressbar">
                                <li class="active" id="step1">
                                    <strong>Step 1</strong>
                                </li>
                                <li id="step2"><strong>Step 2</strong></li>
                                <li id="step3"><strong>Step 3</strong></li>
                                <li id="step4"><strong>Step 4</strong></li>
                            </ul>

                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div> <br>

                            
                            <fieldset>
                                <h2>Welcome To GFG Step 1</h2>
                                <input type="button" name="next-step"
                                    class="next-step" value="Next Step" />
                            </fieldset> 
                            <fieldset> 
                                <h2>Welcome To GFG Step 2</h2>
                                <input type="button" name="next-step"
                                    class="next-step" value="Next Step" />
                                <input type="button" name="previous-step"
                                    class="previous-step"
                                    value="Previous Step" />
                            </fieldset>
                            <fieldset>
                                <h2>Welcome To GFG Step 3</h2>
                                <input type="button" name="next-step"
                                    class="next-step" value="Final Step" />
                                <input type="button" name="previous-step"
                                    class="previous-step"
                                    value="Previous Step" />
                            </fieldset>
                            <fieldset>
                                <div class="finish">
                                    <h2 class="text text-center">
                                        <strong>FINISHED</strong>
                                    </h2>
                                </div>
                                <input type="button" name="previous-step"
                                    class="previous-step"
                                    value="Previous Step" />
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
            </div> --}}

            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card border-light mb-3 mt-4 shadow">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('storage/img/logo.png') }}" class="rounded" style="display: inline-block" alt="..." width="300" >
                                    </div>
                                    <p class="mt-2">{{ 'Av. Urdaneta Esq Pelota Edif Profesional Urdaneta Piso 7 Of D Urb Catedral Caracas Distrito Capital'}} <br>{{'Telefonos: 0412-088.36.74 / 0412-642.67.97 / 0424-640.67.97 ' }}</p>
                                    <a class="btn btn-primary" href="https://www.instagram.com/opti_rango/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i> Instagram</a>
                                    <a class="btn btn-primary" href="https://www.facebook.com/profile.php?id=61551175972400" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i> Facebook</a>
                                    <a class="btn btn-primary" href="https://wa.link/cdtl37" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                                    @foreach($orden as $item)
                                        <hr>
                                        <h3>Información de la Orden Nro. <strong>{{ $item->numero_orden }}</strong></h3>
                                        <h3>Estatus: <strong>{{ $item->estatus }}</strong></h3>
                                        <p>Paciente: <strong>{{ $item->paciente }}</strong>
                                        <br>Cedula: <strong>{{ $item->cedula }}</strong>
                                        <br>Edad: <strong>{{ $item->edad }}</strong>
                                        <br>Teléfono: <strong>{{ $item->telefono }}</strong>
                                        <br>Fecha de Registro: <strong>{{ $item->fecha }}</strong>
                                        <br>Días pasados desde el Registro: <strong>{{ \Carbon\Carbon::parse($item->fecha)->diffInDays(now(), 2) }}</strong>
                                        <br>Fecha de Próxima Cita Gratuita: <strong>{{ $item->fecha_proxima_cita }}</strong>
                                        <br>Dirección / Operativo: <strong>{{ $item->operativo->nombre_operativo }}</strong>
                                        <br>Tipo de Lente: <strong>{{ $item->tipoLente->tipo_lente }}</strong>
                                        @if($item->tipoTratamiento)
                                            <br>Tipo de Tratamiento: <strong>{{ $item->tipoTratamiento->tipo_tratamiento }}</strong>
                                        @endif
                                        <br>Especialista: <strong>{{ $item->especialistaLente->nombre }}</strong>
                                        <br>Monto Total: <strong>{{ $item->total }}</strong>
                                        <br>Saldo Deudor: <strong>{{ $item->saldo }}</strong>
                                        <br>Porcentaje Pagado: <strong>{{ $item->porcentaje_pago }}</strong>
                                        </p>

                                        <div class="alert alert-dismissible alert-info" bis_skin_checked="1">
                                            <p class="text-center">Si deseas realizar un <strong>ABONO</strong> presiona este Link para comunicarte con nosotros <i class="fa fa-arrow-down"></i></p>
                                            <a class="btn btn-lg btn-primary" href="https://wa.link/s5jouq" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                                        </div>

                                        <p class="text-center lead">¡Gracias por confiar su salud visual en nosotros! <span style="color: Green"><i class="fa fa-heart"></i></span></p>



                                    @endforeach
                                    <hr>
                                    <a href="{{ url('/') }}" class="btn btn-success btn-sm"><i class="fa fa-home"></i> Inicio</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<script type="module">


$(document).ready(function () { 
    var currentGfgStep, nextGfgStep, previousGfgStep; 
    var opacity; 
    var current = 1; 
    var steps = $("fieldset").length; 
  
    setProgressBar(current); 
  
    $(".next-step").click(function () { 
  
        currentGfgStep = $(this).parent(); 
        nextGfgStep = $(this).parent().next(); 
  
        $("#progressbar li").eq($("fieldset") 
            .index(nextGfgStep)).addClass("active"); 
  
        nextGfgStep.show(); 
        currentGfgStep.animate({ opacity: 0 }, { 
            step: function (now) { 
                opacity = 1 - now; 
  
                currentGfgStep.css({ 
                    'display': 'none', 
                    'position': 'relative'
                }); 
                nextGfgStep.css({ 'opacity': opacity }); 
            }, 
            duration: 500 
        }); 
        setProgressBar(++current); 
    }); 
  
    $(".previous-step").click(function () { 
  
        currentGfgStep = $(this).parent(); 
        previousGfgStep = $(this).parent().prev(); 
  
        $("#progressbar li").eq($("fieldset") 
            .index(currentGfgStep)).removeClass("active"); 
  
        previousGfgStep.show(); 
  
        currentGfgStep.animate({ opacity: 0 }, { 
            step: function (now) { 
                opacity = 1 - now; 
  
                currentGfgStep.css({ 
                    'display': 'none', 
                    'position': 'relative'
                }); 
                previousGfgStep.css({ 'opacity': opacity }); 
            }, 
            duration: 500 
        }); 
        setProgressBar(--current); 
    }); 
  
    function setProgressBar(currentStep) { 
        var percent = parseFloat(100 / steps) * current; 
        percent = percent.toFixed(); 
        $(".progress-bar") 
            .css("width", percent + "%") 
    } 
  
    $(".submit").click(function () { 
        return false; 
    }) 
}); 

</script>
</body>
</html>

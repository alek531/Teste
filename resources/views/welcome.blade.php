@extends('layout.app')
@section('content')

<style type="text/css">
    a:link{
        text-decoration: none;
    }
   
</style>
<script>
    function toLimit(string = ""){
        string.value = string.value.substring(0,14);
    }
    
    function toLimits(string = ""){
        string.value = string.value.substring(0,14);
    }

    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }

</script>
<script type="text/javascript">
            function fMasc(objeto,mascara) {
                obj=objeto
                masc=mascara
                setTimeout("fMascEx()",1)
            }
            function fMascEx() {
                obj.value=masc(obj.value)
            }
            function mTel(tel) {
                tel=tel.replace(/\D/g,"")
                tel=tel.replace(/^(\d)/,"($1")
                tel=tel.replace(/(.{3})(\d)/,"$1)$2")
                if(tel.length == 9) {
                    tel=tel.replace(/(.{1})$/,"-$1")
                } else if (tel.length == 10) {
                    tel=tel.replace(/(.{2})$/,"-$1")
                } else if (tel.length == 11) {
                    tel=tel.replace(/(.{3})$/,"-$1")
                } else if (tel.length == 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                } else if (tel.length > 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                }
                return tel;
            }
           
        </script>

        <div class="container mt-5" style="background-color: black">
            <div class="row justify-content-center">
                <div class="mt-5 mb-0" >
                    @if (Route::has('login'))
                            @auth
                                <a class="" style="color: white" href="{{route('viewDados')}}">Cadastra seus contatos</a>
                            @else
                               

                                <label class="">
                                          <img src="{{asset('img/nome.png')}}" height="80" class="img-fluid mb-1" width="80">
                                          <div class="ml-1">
                                            <a href="{{ route('login') }}" style="color: white; position: relative;left: 19%">Login</a>
                                          </div>
                                    </label>


                                @if (Route::has('register'))
                                    <label class="ml-5">
                                          <img src="{{asset('img/icone-cadastro.png')}}" height="80" class="img-fluid" width="80">
                                          <div>
                                                <a href="{{ route('register') }}" style="color: white; position: relative;left: -13%" >
                                      
                                                Cadastra-se</a>
                                          </div>
                                    </label>
                                @endif
                            @endauth
                @endif
                </div>
            </div>


                <div class="text-center mt-5">
                    <label style="color: white">Sistema baseado em criação de contatos, edição, <br>atualizar ou exlcuir um<br> contato exitente e a quantidade <br>criada para cada usuario<br> não será exibido para outro.</label>
                    <p class="mt-5" style="padding-bottom: 1em">Por @alex gerboni 2021</p>
                </div>
        </div>   
    </div>
    </nav>
@endsection
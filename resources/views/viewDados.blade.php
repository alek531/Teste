@extends('layout.app')
@section('content')
<style type="text/css">
    a:link{
        text-decoration: none;
    }
    a:hover{
        background-color: black;
        padding-left: 1em;
        padding-right: 1em;
        border-radius: 50px;
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

        <div class="container">
            <div class="row justify-content-center">
                <a href="{{route('verdados')}}">
                <div class="mt-5 mb-0" >
                    <label style="position: relative;left: 15%">
                        <img src="{{asset('img/emprecad.png')}}" height="80" width="130">
                    </label>
                </div>
                   <p class="text-center" style="color: white">Ver contatos cadastrados</p>
                </a>
            </div>
        </div>
    <!-- index de cadastro de cliente -->
      <div class="container-fluid mt-5 mb-3">
            <div class="col-md-1 mt-3 ">
                <a  style=" font-style: normal;padding-top: .4em;padding-left: 1.5em; padding-right: 1.5em;padding-bottom: .4em" href="{{ route('logout') }}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="btn btn-danger">
                Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
                </form>
                </div>
            <div class="row justify-content-center">
                
                <div class="col-md-7 mt-5 text-center" style="background-color: black; border-radius: 40px; ">
                   <h1 style="color: white; font-family: sans-serif;" class="text-center mt-3">Criação de lista de contatos Organizada
                   </h1> 
                    <img src="{{asset('img/icone-cadastro.png')}}" width="45" height="40">

                        <form method="post" action="{{route('control')}}" enctype="multipart/form-data">
                            @csrf
                            <!-- criação do nome completo  -->
                            <div class="mt-5">
                                <label >
                                    <img src="{{asset('img/icone-perfil.png')}}" width="40" height="40">
                                    <input type="text" value="{{old('nome')}}" placeholder="nome completo" class="@error('nome')is-invalid @enderror" name="nome">
                                    @error('nome')
                        <p style="color: yellow">O nome deve ter mais que 4 carecteres</p>
                    @enderror
                                </label>
                            </div>
                           <!--  criação do numero desta pessoa  -->
                            <div class="mt-5">
                                <label >
                                    <img src="{{asset('img/phone.png')}}" width="40" height="40">
                                    <input  onkeyup="toLimits(this)" 
                                    onkeydown="javascript: fMasc( this, mTel );"
                                     placeholder="numero para contato" class="@error('phone')is-invalid @enderror" value="{{old('phone')}}" name="phone">

                                @error('phone')
                                    <p style="color: yellow">O numero de celular deve ser informado</p>
                                @enderror
                                </label>
                            </div>
                             <!-- E-mail para contato  -->
                            <div class="mt-5">
                                <label >
                                    <img src="{{asset('img/caixa-email.png')}}" width="54" height="40">
                                    <input type="email" placeholder="E-mail " value="{{old('email')}}" name="email">

                            @error('email')
                                <p style="color: yellow">O e-mail deve conter mais que 5 digito</p>
                            @enderror
                                </label>
                            </div>
                            <!--   criação do numero desta pessoa  -->
                            <div class="mt-5 mb-3">
                                <label style="color: white">
                                    <img src="{{asset('img/photo.png')}}" class="mr-3" width="42" height="42">
                                    <input type="file" name="logo"  class="form-control @error('logo') is-invalid @enderror">

                                @error('logo')
                                    <div class="invalid-feedback">
                                    {{$message}}
                                    </div>
                                @enderror
                                </label>
                            </div>

                            <button class="btn btn-danger mb-2">Cadastrar contato</button>
                        </form>
                </div>


            </div>
        </div>
         <div class="collapse navbar-collapse row justify-content-between" id="navbarNav">
           
    </div> 
@endsection
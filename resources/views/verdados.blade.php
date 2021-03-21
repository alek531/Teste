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

        <div class="container">
            <div class="row justify-content-center">
                <a href="{{route('viewDados')}}">
                <div class="mt-5 mb-0" >
                    <label style="position: relative;left: 0%">
                        <img src="{{asset('img/home-ico.png')}}" height="40" width="40">
                    </label>
                </div>
                   <p class="text-center" style="color: white">home</p>
                </a>
            </div>
        </div>
    <!-- index de cadastro de cliente -->
      <div class="container-fluid mt-5 ">
            <div class="row justify-content-center ">
                <div class="col-md-7 mt-5 text-center" style="background-color: black; border-radius: 40px; ">
                   <h1 style="color: white; font-family: sans-serif;" class="text-center mt-3">Listando Dados cadastrados
                   </h1> 

                    <table class="table mt-4 ">
                    <thead>
                        <tr>
                            <th style="color: white">Photo</th>
                            <th style="color: white">Nome</th>
                            <th style="color: white">E - mail</th>
                            <th style="color: white">Celular</th>
                            <th style="color: white">Configuração</th>
                        </tr>
                    </thead>
                    <tbody>
                        <p>{{ $recudados->links() }}</p>
                        
                        @foreach($recudados as $recudados)
                        <tr>
                            <td>
                                <div class="text-center  mt-5" >
                                 <img src="{{asset('storage/' . $recudados->logo)}}" width="100" height="100" style="border-radius: 50px;margin-top: -25px;">
                                </div>
                            </td>
                            <td class="text-center">
                                <label style="color: white" class=" mt-5"> {{$recudados->nome}}</label>
                            </td>
                              <td class="text-center">
                                <label style="color: white" class=" mt-5"> {{$recudados->email}}</label>
                            </td>
                              <td class="text-center">
                                <label style="color: white" class=" mt-5"> {{$recudados->phone}}</label>
                            </td>

                             <td class="text-center">
                                <a href="{{route('editar', ['id' => $recudados->id])}}"  class="btn btn-primary mt-5" style="color: white"> Editar</a>
                                
                                <a  href="{{route('destroy', ['id' => $recudados->id])}}"  class="btn btn-danger mt-5" style="color: white"> Excluir</a>
                            </td>
                            
                            @endforeach
                        </tr>
                    </tbody>

                </table>
                </div>
            </div>
        </div>
         <div class="collapse navbar-collapse row justify-content-between" id="navbarNav">
           
    </div> 
@endsection
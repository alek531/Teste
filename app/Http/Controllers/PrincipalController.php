<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Principal;
use App\Http\Requests\DadosRequest;
use App\Http\Requests\EditarRequest;
class PrincipalController extends Controller
{
    public function envio(DadosRequest $request){
    	
    	$recebe = $request->all();
      $user = auth()->user();
    	 if($request->hasFile('logo')){
        $recebe['logo'] = $this->imageUpload($request->file('logo'));
        }

        $user->principal()->create([
        	'logo' => $recebe['logo'],
            'nome' => $recebe['nome'],
            'phone' => $recebe['phone'],
            'email' => $recebe['email'],
        ]);

        flash('Contato cadastrado com sucesso')->warning();
        return back();
    }

    public function viewDados(){
      return view('viewDados');
    }
    // diferenciando o metado para inclusão de imagens
    private function imageUpload($images, $imageColumn = null){
      $uploadImages = [];
      if(is_array($images)){  
      foreach ($images as $image) {
      $uploadImages [] = [ $imageColumn => $image->store('photo', 'public')];
        }
        }else{
        $uploadImages = $images->store('logo', 'public');
       }
        return $uploadImages;
      }

      public function verdados(){

        $recudados = auth()->user()->principal()->paginate(1);
       
        //$recudados = \App\Principal::find($recu);
        return view('verdados',compact('recudados'));
      }

      public function editar($id){
        $usuario = \App\Principal::whereId($id)->first();
        
        return view('editar', compact('usuario'));
      }

      public function atualizar(EditarRequest $request,$id){

        $data = $request->all();
        //dd($data);
        $atualizar = auth()->user()->principal()->find($id);
         
        if($request->hasFile('logo')){
          if(Storage::disk('public')->exists($atualizar->logo)){
            Storage::disk('public')->delete($atualizar->logo);
          }
          $data['logo'] = $this->imageUpload($request->file('logo'));
        }
        
        $atualizar->update($data);
       
        //dd($atualizar);
        flash('Contato atualizado com sucesso')->success();
        return redirect()->route('verdados');
      }

      public function destroy(Request $request, $id){
        $cont = \App\Principal::find($id);
        $cont->delete();
        flash('Contato excluido')->success();
        return back();
      }
      
}

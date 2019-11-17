<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()    
{        
	return view('welcome');  
 }

 public function amigos()
    {
        $amigos = [
                    ['nome' => 'Roque Santiago', 'idade' => 20],                               					['nome' => 'Bruno Alves', 'idade' => 18],                               					['nome' => 'João Natal', 'idade' => 35]
        ];
            return $amigos;    
    }


    public function sobre() {
        $eu = ['nome' => 'Edson', 'idade' => 22];
        
        return view('sobre', compact('eu')); 
      }
   
}

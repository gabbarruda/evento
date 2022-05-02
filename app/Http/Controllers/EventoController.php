<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index() {

        $evento = Evento::all();
        
            return view('welcome',['eventos' => $evento]);
        }
        
        public function create() {
            return view('evento.create');
        }
}
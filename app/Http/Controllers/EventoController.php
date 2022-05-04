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
        public function store(Request $request) {
            $evento = new Evento;

            $evento->title = $request->title;
            $evento->city = $request->city;
            $evento->private = $request->private;
            $evento->description = $request->description;
            // Image Upload

            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->image;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->image->move(public_path('img/evento'), $imageName);

                $evento ->image = $imageName;
            }


            
            $evento->save();

            return redirect('/')->with('msg', 'Evento criado com sucesso!');



        }
        
public function show($id) {
    $eventos = Evento::findOrFail($id);

    return view('evento.show', ['evento' => $eventos]);

}

}
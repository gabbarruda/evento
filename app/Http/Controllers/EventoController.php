<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index() {
        
        $search = request('search');
        if ($search) {

            $eventos = Evento::Where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
           $eventos = Evento::all();
        }        
            return view('welcome',['eventos' => $eventos, 'search' => $search]);
        }
        
        public function create() {
            return view('evento.create');
        }
        public function store(Request $request) {
            $evento = new evento;

            $evento->title = $request->title;
            $evento->date = $request->date;
            $evento->city = $request->city;
            $evento->private = $request->private;
            $evento->description = $request->description;
            $evento->items = $request->items;

            // Image Upload

            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->image;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->image->move(public_path('img/evento'), $imageName);

                $evento ->image = $imageName;
            }


            $user = auth()->user();
            $evento->user_id = $user->id;

            $evento->save();

            return redirect('/')->with('msg', 'Evento criado com sucesso!');



        }
        
public function show($id) {
    $evento = Evento::findOrFail($id);

    return view('evento.show', ['evento' => $evento]);

}

}
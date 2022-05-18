<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Models\Evento;
use Illuminate\Http\Request;

use App\Models\User;

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
    
    $user = auth()->user();
    $hasUserJoined = false;
    if($user) {
        $userEventos = $user->eventosAsParticipant->toArray();
        
        foreach($userEventos as $userEvento) {
                if($userEvento['id'] == $id){
                $hasUserJoined = true;
                }
        }
    }

    $eventoOwner = User::where('id', $evento->user_id)->first()->toArray();

    return view('evento.show', ['evento' => $evento, 'eventoOwner' => $eventoOwner, 'hasUserJoined' => $hasUserJoined]);

}

public function dashboard(){

     $user = auth()->user();

     $eventos = $user->eventos;

     $eventosAsParticipant = $user->eventosAsParticipant;

     return view('evento.dashboard',
      ['eventos' => $eventos, 'eventosAsParticipant'=> $eventosAsParticipant]
    );

}

public function destroy($id) {
    Evento::findOrFail($id)->delete();

    return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
}

public function edit($id) {
    
    $user = auth()->user();

    $evento = Evento::findOrFail($id);

    if($user->id != $evento->user->id) {
        return redirect('/dashboard');
    }

    return view('evento.edit', ['evento' => $evento]);
}

public function update(Request $request) {
    $data = $request->all();
    
     // Image Upload

     if($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $request->image->move(public_path('img/evento'), $imageName);

        $data['image'] = $imageName;
    }
    Evento::findOrFail($request->id)->update($data);
    
    return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
}

public function joinEvento($id) {

    $user = auth()->user();

    $user->eventosAsParticipant()->attach($id);

    $evento = Evento::findOrFail($id);

    return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $evento->title);
}

public function leaveEvento($id){
    $user = auth()->user();

    $user->eventosAsParticipant()->detach($id);

    $evento = Evento::findOrFail($id);

    return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $evento->title);

  }

}
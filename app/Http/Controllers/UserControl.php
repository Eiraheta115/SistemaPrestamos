<?php

namespace App\Http\Controllers;
use App\User;
use Mail;
use Session;
use Illuminate\Http\Request;

class UserControl extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function enviaremail(Request $request, $id){
        //dd($request);
        $request->validate([
            'para' => 'required',
            'tema' => 'required',
            'cuerpo' => 'required'
        ]);
        //dd($request);
        $para=$request->para;
        $tema=$request->tema;
        $data = array(
            'cuerpo' => $request->cuerpo
        );
        
        Mail::send('email.mail', $data, function($message) use($para, $tema){
            $message->from('ceiraheta87@gmail.com', 'MPJ Prestamos');
            $message->to($para)->subject($tema);
        });
        
        Session::flash('Mensaje', 'Correo enviado exitosamente a '.$para);
       return redirect()->route('prestamoDetalle', $id);
    }
}

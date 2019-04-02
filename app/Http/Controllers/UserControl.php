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

    public function update(Request $request, $id){
        $user = User::find($id);
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
        ]);
        //$input = $request->only('nombre','correo');
        //$user = User::find($id);
        $user->name=$request->nombre;
        $user->email=$request->correo;
        $user->save();
        Session::flash('Mensaje', 'Datos modificados exitosamente');
        return view('user.show', compact('user'));
    }

    public function updatePass(Request $request, $id){
        $user = User::find($id);
        if(strlen($request->pass)>6 && strlen($request->npass)>6){
            if($request->pass==$request->npass){   
                $user->password=bcrypt($request->pass);
                $user->save();
                Session::flash('Mensaje', 'Contraseña modificada exitosamente');
                return view('user.show', compact('user'));
            }else {
                Session::flash('Error', 'Contraseñas no coinciden');
                return view('user.show', compact('user'));
            }
        }else{
            Session::flash('Error', 'Se requiere 6 caracteres como minimo en la contraseña');
            return view('user.show', compact('user'));
        }
        
        
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

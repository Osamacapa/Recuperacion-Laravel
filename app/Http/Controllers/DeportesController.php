<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deportes;

class DeportesController extends Controller
{
    public function index(){
        return Deportes::get();
    }

    public function create(Request $request){
        try{
            $request->validate([
                'deporte' => 'required|string',
                'informacion' => 'required|pharagraf',
                'posiicion' => 'required|string',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Deportes::create([
            'deporte' => $request->string,
            'informacion' => $request->pharagraf,
            'posiicion' => $request->string,
        ]);
        return 'Creado con exito';
    }

    public function update(Request $request, Int $id){
        try{
            $request->validate([
            'deporte' => 'string',
            'informacion' => 'pharagraf',
            'posiicion' => 'string',
            ]);
            
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }   
        $deportes = Deportes::find($id);
        $deportes->update([
            'deporte' => $request->string,
            'informacion' => $request->pharagraf,
            'posiicion' => $request->string,
        ]);

        return $deportes;
    }

    public function show($id){
        return Deportes::find($id);
    }

    public function destroy($id){
        Deportes::where('id', $id)->delete();
        return 'Eliminado con exito';
    }
}

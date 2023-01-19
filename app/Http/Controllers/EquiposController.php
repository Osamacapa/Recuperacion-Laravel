<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Equipos;

class EquiposController extends Controller
{
    public function index(){
        return Equipos::get();
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name' => 'required|string',
                'genero' => 'required|string',
                'fechaCreacion' => 'required|date',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Equipos::create([
            'name' => $request->string,
            'genero' => $request->string,
            'fechaCreacion' => $request->date,
        ]);
        return 'Creado con exito';
    }

    public function update(Request $request, Int $id){
        try{
            $request->validate([
                'name' => 'string',
                'genero' => 'string',
                'fechaCreacion' => 'date',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }
        $equipos = Equipos::find($id);
        $equipos->update([
            'name' => $request->string,
            'genero' => $request->string,
            'fechaCreacion' => $request->date,
        ]);
        return $equipos;
    }
}

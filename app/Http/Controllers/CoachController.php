<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;

class CoachController extends Controller
{
    public function index(){
        return Coach::get();
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name' => 'required|string',
                'edad' => 'required|integer',
                'equipo' => 'required|string',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Coach::create([
            'name' => $request->string,
            'edad' => $request->integer,
            'equipo' => $request->string,
        ]);
        return 'Creado con exito';
    }

    public function update(Request $request, Int $id){
        try{
            $request->validate([
                'name' => 'string',
                'edad' => 'integer',
                'equipo' => 'string',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }
        $coach = Coach::find($id);
        $coach->update([
            'name' => $request->string,
            'edad' => $request->integer,
            'equipo' => $request->string,
        ]);
        return $coach;
    }

    public function show($id){
        return Coach::find($id);
    }

    public function destroy($id){
        Coach::where('id', $id)->delete();
        return 'Eliminado con exito';
    }
}

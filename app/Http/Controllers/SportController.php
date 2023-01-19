<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
    public function index(){
        return Sport::get();
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name' =>'required|string',
                'division' =>'required|string',
                'juagdores' =>'required|integer',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Sport::create([
            'name' => $request->string,
            'division' => $request->string,
            'juagdores' => $request->integer,
        ]);
        return 'Creado con exito';
    }

    public function update(Request $request, Int $id){
        try{
            $request->validate([
                'name' =>'string',
                'division' =>'string',
                'juagdores' => 'integer',
            ]);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }
        $sport = Sport::find($id);
        $sport->update([
            'name' => $request->string,
            'division' => $request->string,
            'juagdores' => $request->integer,
        ]);
        return $sport;
    }

    public function show($id){
        return Sport::find($id);
    }

    public function destroy($id){
        Sport::where('id', $id)->delete();
        return 'Eliminado con exito';
    }
}

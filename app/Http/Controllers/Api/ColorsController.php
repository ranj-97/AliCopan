<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Support\Facades\Gate;

class ColorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index(){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        return Color::all()->where('active',1);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }
    }

    ////////////////////////

    public function store(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $request->validate([
            'name' => 'required|string|max:191',
        ]);
        return Color::create([
                'name'=>$request['name'],
                
        ]);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }

    ///////////////////////

    public function update(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $user=Color::findorFail($request->id);

        $request->validate([
            'name' => 'required|string|max:191',
        ]);
        $user->update($request->all());
        return ["message"=>"Updated Color Name"];
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }

    //////////////////////////

    public function delete(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $data=Color::findorFail($request->id);
        $data->delete();

        return response()->json('Color Deleted');
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }
        
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quality;
use Illuminate\Support\Facades\Gate;

class QualitysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index(){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        return Quality::all()->where('active',1);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }
    }

    ////////////////////////

    public function store(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $request->validate([
            'type'=>'required|string|',
        ]);
        return Quality::create([
                'type'=>$request['name'],
                'companyID'=>$request['companyID'],
                
        ]);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }

    ///////////////////////

    public function update(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $user=Quality::findorFail($request->id);

        $request->validate([
            'type' => 'required|string',
        ]);
        $user->update($request->all());
        return ["message"=>".براندەلەت بە سەرکەوتوی نوێ کرایەوە"];
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }

    //////////////////////////

    public function delete(Request $request){
        // if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        //     $user=Quality::findorFail($request->id);

        //     $user->update($request->all());
        //     return ["message"=>"براندەکەت بە سەرکەوتووی سڕدرایەوە"];
        // }
        // else {
        //     abort(403, 'Unauthorized Action.');
           
        // }
        
    }
}

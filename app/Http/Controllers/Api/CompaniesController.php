<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Gate;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index(){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        return Company::all()->where('active',1);
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
        return Company::create([
                'name'=>$request['name'],
                
        ])->with(["message"=>".براندەکەت بە سەرکەوتوی زیادکرا"]);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }

    ///////////////////////

    public function update(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $user=Company::findorFail($request->id);

        $request->validate([
            'name' => 'required|string|max:191',
        ]);
        $user->update($request->all());
        return ["message"=>".براندەکەت بە سەرکەوتوی نوێ کرایەوە"];
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }

    //////////////////////////

    public function delete(Request $request){
        // if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        //     $user=Company::findorFail($request->id);

        //     $user->update($request->all());
        //     return ["message"=>"براندەکەت بە سەرکەوتووی سڕدرایەوە"];

        // }
        // else {
        //     abort(403, 'Unauthorized Action.');
           
        // }
        
    }
}

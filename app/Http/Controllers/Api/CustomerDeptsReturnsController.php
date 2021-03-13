<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerDeptsReturn;
use Illuminate\Support\Facades\Gate;

class CustomerDeptsReturnsController extends Controller
{
    public function index(){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        return CustomerDeptsReturn::all()->where('active',1);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }
    }
    public function store(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $request->validate([
            'customerID' => 'required',
            'payed'=>'required',
            'pay_date'=>'required',
        ]);
        return CustomerDeptsReturn::create([
                'customerID'=>$request['customerID'],
                'payed'=>$request['payed'],
                'pay_date'=>$request['pay_date'],
                
        ]);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }
    public function update(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $user=CustomerDeptsReturn::findorFail($request->id);

        $request->validate([
            'customerID' => 'required',
            'payed'=>'required',
            'pay_date'=>'required',
        ]);
        $user->update($request->all());
        return ["message"=>"Updated Color Name"];
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }
    public function delete(Request $request){
        return "";
    }
}

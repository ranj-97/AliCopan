<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CustomersController extends Controller
{
    public function index(){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        return Customer::all()->where('active',1);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }
    }
    
    public function store(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $request->validate([
            'name' => 'required|string|max:191',
            'phone'=>'required|regex:/(07)[0-9]{9}/',
            'address'=>'required|string|max:191',
        ]);
        return Customer::create([
                'name'=>$request['name'],
                'phone'=>$request['phone'],
                'address'=>$request['address'],
                
        ]);
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }
   
    public function update(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $user=Customer::findorFail($request->id);

        $request->validate([
            'name' => 'required|string|max:191',
            'phone'=>'required|regex:/(07)[0-9]{9}/',
            'address'=>'required|string|max:191',
        ]);
        $user->update($request->all());
        return ["message"=>"Updated Color Name"];
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }

    }
    public function delete(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
        $data=Customer::findorFail($request->id);
        $data->delete();

        return response()->json('Color Deleted');
        }
        else {
            abort(403, 'Unauthorized Action.');
           
        }
        
    }
}

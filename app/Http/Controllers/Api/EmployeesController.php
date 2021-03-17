<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class EmployeesController extends Controller
{
    public function index(){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
            return Employee::all()->where('active',1);
            }
            else {
                abort(403, 'Unauthorized Action.');
               
            }
    }
    public function create(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
            $request->validate([
                'name' => 'required|string|max:191',
                'birth_date'=>'required',
                'phone'=>'required',
                'salary'=>'required',
                'start_date'=>'required',
                'end_date'=>'required',
            ]);
            return Employee::create([
                    'name'=>$request['name'],
                    'birth_date'=>$request['birth_date'],
                    'phone'=>$request['phone'],
                    'salary'=>$request['salary'],
                    'start_date'=>$request['start_date'],
                    'end_date'=>$request['end_date'],
                    
            ])->with(["message"=>".براندەکەت بە سەرکەوتوی زیادکرا"]);
            }
            else {
                abort(403, 'Unauthorized Action.');
               
            };
    }
    public function update(Request $request){
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin') ) {
            $user=Employee::findorFail($request->id);
    
            $request->validate([
                'name' => 'required|string|max:191',
                'birth_date'=>'required',
                'phone'=>'required',
                'salary'=>'required',
                'start_date'=>'required',
                'end_date'=>'required',
            ]);
            $user->update($request->all());
            return ["message"=>".براندەکەت بە سەرکەوتوی نوێ کرایەوە"];
            }
            else {
                abort(403, 'Unauthorized Action.');
               
            }
    }
    public function delete(Request $request){
        return "";
    }
}

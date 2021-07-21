<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class CrudController extends Controller
{
    public function index(){
        $datas=Crud::all();
        return view('admin.index',compact('datas'));
    }

   public function store(Request $request){
       $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'country'=>'required',
            'address'=>'required',

       ]);
       Crud::create([
           'name'=>$request['name'],
           'email'=>$request['email'],
           'phone'=>$request['phone'],
           'country'=>$request['country'],
           'address'=>$request['address'],
       ]);
       return redirect()->back()->with('status','Add Successfully');
   }

  public function update(Request $request,Crud  $crud){
    $this->validate($request,[
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'country'=>'required',
        'address'=>'required',

   ]);
$crud->update([
       'name'=>$request['name'],
       'email'=>$request['email'],
       'phone'=>$request['phone'],
       'country'=>$request['country'],
       'address'=>$request['address'],
   ]);
   return redirect()->back()->with('status','Update Successfully');
       
  }

  public function delete(Crud  $crud){
$crud->delete();
return redirect()->back()->with('status','Deleted Successfully');

  }
}
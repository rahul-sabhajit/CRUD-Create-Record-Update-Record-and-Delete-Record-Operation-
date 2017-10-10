<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input, Redirect,Session,Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use DB;
use App;
use View;
use Auth;
use App\testmodel;

class test_controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$test =DB::table('test')
        $_test = testmodel::get();
         return view('test')
         ->with('_test', $_test);
          
    }



    public function store()
    {
         $_store = new testmodel;
         $_store->name             = Input::get('name');
         $_store->email         = Input::get('email');
         $_store->phone         = Input::get('phone');
         $_store->website         = Input::get('website');
         $_store->subject         = Input::get('subject');
         $_store->msg         = Input::get('msg');
         $_store->phone         = Input::get('phone');
         $_store->save();

           Session::flash('message', 'Successfully Updated!');
            return Redirect::to('test');
    }

    public function edit($id)
    {
         $test_edit =testmodel::find($id);
         $_test =DB::table('test')->get();
          return view('test')
         ->with('test_edit', $test_edit)
         ->with('_test', $_test);
    }

     public function update()
    {
         $id = Input::get('id');
         $test_update = testmodel::find($id);
         $test_update->name             = Input::get('name');
         $test_update->email         = Input::get('email');
         $test_update->phone         = Input::get('phone');
         $test_update->website         = Input::get('website');
         $test_update->subject         = Input::get('subject');
         $test_update->msg         = Input::get('msg');
         $test_update->phone         = Input::get('phone');
         $test_update->save();
         Session::flash('message', 'Successfully Updated!');
         return Redirect('test');
    }

     public function delete($id)
    {
            testmodel::find($id)->delete();
            Session::flash('message', 'Data Successfully Deleted! ');
             return back()->withInput();
    }

}

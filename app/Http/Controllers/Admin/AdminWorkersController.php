<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWorkersController extends Controller
{
    /*
    |==================================================
    | Display a listing of the resource.
    |==================================================
    */
    public function index()
    {
        // code for api
        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url').'api/admin/workers';
        $response = \Unirest\Request::get($url ,$headers, $body);

        // dd($response);

        $status = $response->body->status;
        if ($status == 200) {

            $workers          = $response->body->workers;
            $workers_count    = $response->body->workers_count;
            $active_workers   = $response->body->active_workers;
            $inactive_workers = $response->body->inactive_workers;


            return view('admin.workers.index')->with(['workers' => $workers])
                                                 ->with(['workers_count'    => $workers_count])
                                                 ->with(['active_workers'   => $active_workers])
                                                 ->with(['inactive_workers'          => $inactive_workers]);

        }

            return "Something Went Wrong";
    }
    }



    /*
    |===================================================
    | Show the form for creating a new resource.
    |===================================================
    */
    public function create()
    {
        return view('admin.workers.create');
    }



    /*
    |=======================================================
    | Store a newly created resource in storage.
    |=======================================================
    */
    public function store(Request $request)
    {
        $validator = \Validator::make( $request->all(), [
            'name'     => 'required|string|max:100',
            'email'     =>'required|email|max:300',
            'phone'     => 'required|string|max:40',
            'city'     =>'required|string|max:60',
            'address'     =>'required|string|max:300',


        ]);
        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url').'api/admin/workers';
        $body     = $request->all();

        if ($request->hasFile('image')) {

            $validator = \Validator::make( $request->all(),[
                'image'     => 'required|image|mimes:jpeg|png|jpg|gif|max:2048',
            ]);
            $body['image']  =  \Unirest\Request\Body::file($request->image);
        }
        else {
            $body['image'] = null;
        }

        $response = \Unirest\Request::post($url ,$headers, $body);

		// dd($response);
        $status = $response->body->status;
        if ($status == 200) {

            $message = $response->body->message;
            Session::flash('response', array( "status"  => 200,
                                              "action"  => 'add',
                                              "message" => 'Worker Added Successfully'
                                            ));
            return redirect('/admin/workers');
        }

        else {
            $errors = $response->body->errors;
            Session::flash('errors', $errors);
            return back();
        }
    }



    /*
    |==================================================
    | Display the specified resource.
    |==================================================
    */
    public function show($id)
    {
        //
    }



    /*
    |==========================================================
    | Show the form for editing the specified resource.
    |==========================================================
    */
    public function edit($id)
    {
        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url')."api/admin/workers/$id/edit";
        $response = \Unirest\Request::get($url, $headers, $body);

        $status = $response->body->status;

        if ($status == 200) {

            $worker = $response->body->worker;
            return view('admin.workers.edit')->with(["worker" => $worker]);
        }

        return "Sorry, Something Went Wrong";
    }



    /*
    |====================================================
    | Update the specified resource in storage.
    |====================================================
    */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make( $request->all(), [
            'name'     => 'required|string|max:100',
            'email'     =>'required|email|max:300',
            'phone'     => 'required|string|max:40',
            'city'     =>'required|string|max:60',
            'address'     =>'required|string|max:300',


        ]);
        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url').'api/admin/workers';
        $body     = $request->all();

        if ($request->hasFile('image')) {

            $validator = \Validator::make( $request->all(),[
                'image'     => 'required|image|mimes:jpeg|png|jpg|gif|max:2048',
            ]);
            $body['image']  =  \Unirest\Request\Body::file($request->image);
        }
        else {
            $body['image'] = null;
        }

        $response = \Unirest\Request::post($url ,$headers, $body);

		// dd($response);
        $status = $response->body->status;
        if ($status == 200) {

            $message = $response->body->message;
            Session::flash('response', array( "status"  => 200,
                                              "action"  => 'update',
                                              "message" => 'Worker Updated Successfully'
                                            ));
            return redirect('/admin/workers');
        }

        else {
            $errors = $response->body->errors;
            Session::flash('errors', $errors);
            return back();
        }
    }



    /*
    |====================================================
    | Remove the specified resource from storage.
    |====================================================
    */
    public function destroy($id)
    {

        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url')."api/admin/workers/$id";
        $response = \Unirest\Request::delete($url, $headers, $body);

        $code   = $response->code;
        $status = $response->body->status;

        if ($code == 200 && $status == 200) {

            $success = $response->body->message;
            Session::flash('response', array("status"  => 200,
                                             "action"  => 'delete',
                                             "message" => 'Blog Deleted Successfully'
                                            ));
            return back();
        }

        else{
            return "Sorry, Something Went Wrong";
        }
    }
}

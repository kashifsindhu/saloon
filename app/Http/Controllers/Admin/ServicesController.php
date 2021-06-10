<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ServicesController extends Controller
{
    /*
    |==================================================
    | Display a listing of the resource.
    |==================================================
    */
    public function index()
    {

        return view('admin.services.index');
        // $token = session()->get('token');

        // $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        // $body     = NULL;
        // $url      = config('app.url').'api/admin/subcategories';
        // $response = \Unirest\Request::get($url ,$headers, $body);

        // // dd($response);

        // $status = $response->body->status;

        // if ($status == 200) {

        //     $subcategories          = $response->body->subcategories;
        //     $subcategories_count    = $response->body->subcategories_count;
        //     $active_subcategories   = $response->body->active_subcategories;
        //     $inactive_subcategories = $response->body->inactive_subcategories;
        //     $featured_subcategories = $response->body->featured_subcategories;

        //     return view('admin.subcategories.index')->with(['subcategories'          => $subcategories])
        //                                             ->with(['subcategories_count'    => $subcategories_count])
        //                                             ->with(['active_subcategories'   => $active_subcategories])
        //                                             ->with(['inactive_subcategories' => $inactive_subcategories])
        //                                             ->with(['featured_subcategories' => $featured_subcategories]);
        // }

        //     return "Something Went Wrong";
    }



    /*
    |===================================================
    | Show the form for creating a new resource.
    |===================================================
    */
    public function create()
    {
        return view('admin.services.create');
        // $token = session()->get('token');

        // $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        // $body     = NULL;
        // $url      = config('app.url').'api/admin/subcategories/create';
        // $response = \Unirest\Request::get($url ,$headers, $body);

        // // dd($response);

        // $status = $response->body->status;

        // if ($status == 200) {

        //     $categories = $response->body->categories;
        //     return view('admin.subcategories.create')->with(['categories' => $categories]);
        // }

        // return "Something Went Wrong";
    }



    /*
    |=======================================================
    | Store a newly created resource in storage.
    |=======================================================
    */
    public function store(Request $request)
    {
        $validator = \Validator::make( $request->all(), [
        'title1'     => 'required|string|max:60|min:4',
        'title2'     => 'required|string|max:60|min:4',
        'title3'     => 'required|string|max:60|min:4',
        ]);

        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url').'api/admin/subcategories';
        $body     = $request->all();

        if ($request->image) {
            $validator = \Validator::make( $request->all(), [
                'image' => 'bail|mimes:jpeg,png,jpg,gif,svg',
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
                                              "message" => 'Subcategory Added Successfully'
                                            ));
            return redirect('/admin/subcategories');
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
        return view('admin.services.edit');
        // $token = session()->get('token');

        // $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        // $body     = NULL;
        // $url      = config('app.url')."api/admin/subcategories/$id/edit";
        // $response = \Unirest\Request::get($url, $headers, $body);

        // // dd($response);
        // $status = $response->body->status;

        // if ($status == 200) {

        //     $subcategory = $response->body->subcategory;
        //     $categories  = $response->body->categories;

        //     return view('admin.subcategories.edit')->with(["subcategory" => $subcategory])
        //                                            ->with(["categories"  => $categories]);
        // }

        // return "Sorry, Something Went Wrong";
    }



    /*
    |====================================================
    | Update the specified resource in storage.
    |====================================================
    */
    public function update(Request $request, $id)
    {
        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token);
        $url      = config('app.url')."api/admin/subcategories/$id";
        $body     = $request->all();

        if ($request->image) {

            $validator = \Validator::make( $request->all(), [
                'image' => ['bail', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);
            $body['image']  =  \Unirest\Request\Body::file($request->image);
        }

        $response = \Unirest\Request::post($url, $headers, $body);

        // dd($response);
        $code   = $response->code;
        $status = $response->body->status;

        if ($code == 200 && $status == 200) {

            $message = $response->body->message;
            Session::flash('response', array( "status"  => 200,
                                              "action"  => 'update',
                                              "message" => 'Subcategory Updated Successfully'
                                            ));
            return back();
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
        $url      = config('app.url')."api/admin/subcategories/$id";
        $response = \Unirest\Request::delete($url, $headers, $body);

        // dd($response);

        $code   = $response->code;
        $status = $response->body->status;

        if ($code == 200 && $status == 200) {

            $success = $response->body->message;
            Session::flash('response', array("status"  => 200,
                                             "action"  => 'delete',
                                             "message" => 'Subcategory Deleted Successfully'
                                            ));
            return back();
        }

        else{
            return "Sorry, Something Went Wrong";
        }
    }
}

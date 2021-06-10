<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class AdminCategoriesController extends Controller
{
    /*
    |==================================================
    | Display a listing of the resource.
    |==================================================
    */
    public function index()
    {
        // $categories=null;
        // return view('admin.categories.index');

        // code for api
        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url').'api/admin/categories';
        $response = \Unirest\Request::get($url ,$headers, $body);

        // dd($response);

        $status = $response->body->status;
        if ($status == 200) {

            $categories          = $response->body->categories;
            $categories_count    = $response->body->categories_count;
            $active_categories   = $response->body->active_categories;
            $inactive_categories = $response->body->inactive_categories;
            $featured_categories = $response->body->featured_categories;

            return view('admin.categories.index')->with(['categories'          => $categories])
                                                 ->with(['categories_count'    => $categories_count])
                                                 ->with(['active_categories'   => $active_categories])
                                                 ->with(['inactive_categories'          => $inactive_categories])
                                                 ->with(['featured_categories' => $featured_categories]);
        }

            return "Something Went Wrong";
    }



    /*
    |===================================================
    | Show the form for creating a new resource.
    |===================================================
    */
    public function create()
    {
        return view('admin.categories.create');
    }



    /*
    |=======================================================
    | Store a newly created resource in storage.
    |=======================================================
    */
    public function store(Request $request)
    {


        $validator = \Validator::make( $request->all(), [
            'title1'     => 'required|string|max:100',
            'title2'     =>'required|string|max:100',
            'title3'     => 'required|string|max:100',

        ]);

        //dd('judf');
        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url').'api/admin/categories';
        $body     = $request->all();

        if ($request->hasFile('image')) {

            $validator = \Validator::make( $request->all(),[
                'image1'     => 'required|image|mimes:jpeg|png|jpg|gif|max:2048',
                'image2'     => 'required|image|mimes:jpeg|png|jpg|gif|max:2048',
                'image3'     => 'required|image|mimes:jpeg|png|jpg|gif|max:2048',
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
                                              "message" => 'Category Added Successfully'
                                            ));
            return redirect('/admin/categories');
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
        // return view('admin.categories.edit');


        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url')."api/admin/categories/$id/edit";
        $response = \Unirest\Request::get($url, $headers, $body);

        $status = $response->body->status;

        if ($status == 200) {

            $category = $response->body->category;
            return view('admin.categories.edit')->with(["category" => $category]);
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
            'title1'     => 'required|string|max:100',
            'title2'     =>'required|string|max:100',
            'title3'     => 'required|string|max:100',
        ]);

        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url')."api/admin/categories/$id";
        $body     = $request->all();

        if ($request->image) {
            $validator = \Validator::make( $request->all(), [
                'image' => ['bail', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);
            $body['image']  =  \Unirest\Request\Body::file($request->image);
        }

        $response = \Unirest\Request::post($url, $headers, $body);

        $code   = $response->code;
        $status = $response->body->status;

        if ($code == 200 && $status == 200) {

            $message = $response->body->message;
            Session::flash('response', array( "status"  => 200,
                                              "action"  => 'update',
                                              "message" => 'Category Updated Successfully'
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
        $url      = config('app.url')."api/admin/categories/$id";
        $response = \Unirest\Request::delete($url, $headers, $body);

        $code   = $response->code;
        $status = $response->body->status;

        if ($code == 200 && $status == 200) {

            $success = $response->body->message;
            Session::flash('response', array("status"  => 200,
                                             "action"  => 'delete',
                                             "message" => 'Category Deleted Successfully'
                                            ));
            return back();
        }

        else{
            return "Sorry, Something Went Wrong";
        }
    }
}

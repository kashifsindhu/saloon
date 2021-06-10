<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
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
        $url      = config('app.url').'api/admin/products';
        $response = \Unirest\Request::get($url ,$headers, $body);

        // dd($response);

        $status = $response->body->status;
        if ($status == 200) {

            $products          = $response->body->products;
            $products_count    = $response->body->products_count;
            $active_products   = $response->body->active_products;
            $inactive_products = $response->body->inactive_products;


            return view('admin.products.index')->with(['products' => $products])
                                                 ->with(['products_count'    => $products_count])
                                                 ->with(['active_products'   => $active_products])
                                                 ->with(['inactive_products'          => $inactive_products]);

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
        return view('admin.products.create');
    }



    /*
    |=======================================================
    | Store a newly created resource in storage.
    |=======================================================
    */
    public function store(Request $request)
    {
        $validator = \Validator::make( $request->all(), [

            'title'     => 'required|string|max:30|min:4',
            'description'  =>'required|string|max:300',
            'details'  =>'required|string|max:300',


        ]);
        if ($request->image) {
            $validator = \Validator::make( $request->all(), [
                'image' => 'bail|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $url      = config('app.url')."api/admin/products/$id/edit";
        $response = \Unirest\Request::get($url, $headers, $body);

        $status = $response->body->status;

        if ($status == 200) {

            $blog = $response->body->blog;
            return view('admin.products.edit')->with(["product" => $product]);
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
            'title'     => 'required|string|max:100',
            'details'     =>'required|string|max:400',

        ]);
        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url').'api/admin/products';
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
                                              "message" => 'Product Updated Successfully'
                                            ));
            return redirect('/admin/products');
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
        //
    }
}

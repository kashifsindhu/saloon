<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // code for api
        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url').'api/admin/blogs';
        $response = \Unirest\Request::get($url ,$headers, $body);

        // dd($response);

        $status = $response->body->status;
        if ($status == 200) {

            $blogs          = $response->body->blogs;
            $blogs_count    = $response->body->blogs_count;
            $active_blogs   = $response->body->active_blogs;
            $inactive_blogs = $response->body->inactive_blogs;


            return view('admin.blogs.index')->with(['blogs' => $blogs])
                                                 ->with(['blogs_count'    => $blogs_count])
                                                 ->with(['active_blogs'   => $active_blogs])
                                                 ->with(['inactive_blogs'          => $inactive_blogs]);

        }

            return "Something Went Wrong";
    }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make( $request->all(), [
            'title'     => 'required|string|max:100',
            'details'     =>'required|string|max:400',

        ]);

        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url').'api/admin/blogs';
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
                                              "message" => 'Blog Added Successfully'
                                            ));
            return redirect('/admin/blogs');
        }

        else {
            $errors = $response->body->errors;
            Session::flash('errors', $errors);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url')."api/admin/blogs/$id/edit";
        $response = \Unirest\Request::get($url, $headers, $body);

        $status = $response->body->status;

        if ($status == 200) {

            $blog = $response->body->blog;
            return view('admin.blogs.edit')->with(["blog" => $blog]);
        }

        return "Sorry, Something Went Wrong";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make( $request->all(), [
            'title'     => 'required|string|max:100',
            'details'     =>'required|string|max:400',

        ]);
        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url').'api/admin/blogs';
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
                                              "message" => 'Blog Added Successfully'
                                            ));
            return redirect('/admin/blogs');
        }

        else {
            $errors = $response->body->errors;
            Session::flash('errors', $errors);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url')."api/admin/blogs/$id";
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


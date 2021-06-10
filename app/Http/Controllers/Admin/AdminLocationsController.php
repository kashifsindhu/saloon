<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLocationsController extends Controller
{
    /*
    |==================================================
    | Display a listing of the resource.
    |==================================================
    */
    public function index()
    {
        return view('admin.locations.index');
        // code for api
        $token = session()->get('token');

        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $body     = NULL;
        $url      = config('app.url').'api/admin/locations';
        $response = \Unirest\Request::get($url ,$headers, $body);

        // dd($response);

        $status = $response->body->status;
        if ($status == 200) {

            $locations          = $response->body->locations;
            $locations_count    = $response->body->locations_count;
            $active_locations   = $response->body->active_locations;
            $inactive_locations = $response->body->inactive_locations;


            return view('admin.locations.index')->with(['locations' => $locations])
                                                 ->with(['locations_count'    => $locations_count])
                                                 ->with(['active_locations'   => $active_locations])
                                                 ->with(['inactive_locations'          => $inactive_locations]);

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
        return view('admin.locations.');
    }



    /*
    |=======================================================
    | Store a newly created resource in storage.
    |=======================================================
    */
    public function store(Request $request)
    {

            $validator = \Validator::make( $request->all(), [
                'city'     => 'required|string|max:300',
            ]);

            $token    = session()->get('token');
            $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
            $url      = config('app.url').'api/admin/locations';
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
                                                  "message" => 'Location Added Successfully'
                                                ));
                return redirect('/admin/locations');
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
        $url      = config('app.url')."api/admin/locations/$id/edit";
        $response = \Unirest\Request::get($url, $headers, $body);

        $status = $response->body->status;

        if ($status == 200) {

            $location = $response->body->location;
            return view('admin.locations.edit')->with(["location" => $location]);
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
            'city'     => 'required|string|max:300',

        ]);
        $token    = session()->get('token');
        $headers  = array('Accept' => 'application/json' , 'Authorization' => $token );
        $url      = config('app.url').'api/admin/locations';
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
                                              "message" => 'Location Added Successfully'
                                            ));
            return redirect('/admin/locations');
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
     * @param  int  $i
    **/



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
        $url      = config('app.url')."api/admin/locations/$id";
        $response = \Unirest\Request::delete($url, $headers, $body);

        $code   = $response->code;
        $status = $response->body->status;

        if ($code == 200 && $status == 200) {

            $success = $response->body->message;
            Session::flash('response', array("status"  => 200,
                                             "action"  => 'delete',
                                             "message" => 'Location Deleted Successfully'
                                            ));
            return back();
        }

        else{
            return "Sorry, Something Went Wrong";
        }
    }
}

@extends('admin.layouts.master',['navItem'=>''])
@section('content')

    <div class="container-fluid ">

        {{-- error message  --}}
         @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
        <div class="card">
            {{-- header and back button --}}
            <div class="card-header">
                <h5 class="d-inline">Edit Location</h5>
                <a href="{{ URL::to('/locations') }}" class="btn btn-primary float-right d-inline" title="Back to Locations list">
                    <strong>back</strong>
                </a>
            </div>

            <div class="card-body">
                <form action="{{ URL::to('/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- City --}}
                        <div class="col-md-6 mb-4">
                            <label for="city"><strong>City: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="row">
                        {{--Image--}}
                        <div class="col-md-6 mb-4">
                            <label for="image"><strong>Image:</strong></label>
                            <input type="file" class="form-control mb-3" name="image" title="Add Location Image">
                        </div>
                    </div>

                    <div class="row">
                        {{-- status swich --}}
                        <div class="col-md-6 mb-4 ">
                        <label class="d-block"><strong>Status:</strong></label>
                        <label class="toggle-switch">
                            <input type="checkbox" name="status" id="status">
                            <span class="toggle-switch-slider"></span>
                            </label>
                        </div>
                    </div>

                    {{-- button --}}
                    <button type="submit" class="btn btn-primary float-right">Update</button>

                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

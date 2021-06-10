@extends('admin.layouts.master',['navItem'=>'workers'])
@section('content')

    <div class="container-fluid ">

        {{-- error message --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
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
                <h5 class="d-inline">Edit Worker</h5>
                <a href="{{ URL::to('/admin/workers') }}" class="btn btn-primary float-right d-inline"
                    title="Back to list of Blogs">
                    <strong>back</strong>
                </a>
            </div>

            <div class="card-body">
                <form action="{{ URL::to('/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-8 mx-auto">

                        {{-- name --}}
                        <div class="col-md-8 mb-4">
                            <label for="name"><strong>Name: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="name" id="name" required>
                        </div>

                        {{-- email --}}
                        <div class="col-md-8 mb-4">
                            <label for="email"><strong>Email: <sup class="text-danger">*</sup></strong></label>
                            <input type="email" class="form-control mb-3" email="email" id="email" required>
                        </div>

                        {{-- phone --}}
                        <div class="col-md-8 mb-4">
                            <label for="phone"><strong>Phone: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="phone" id="phone" required>
                        </div>

                        {{-- city --}}
                        <div class="col-md-8 mb-4">
                            <label for="city"><strong>city: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="city" id="city" required>
                        </div>

                        {{-- address --}}
                        <div class="col-md-8 mb-4">
                            <label for="address"><strong>Address: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="address" id="address" required>
                        </div>

                        {{-- gender --}}
                        <div class="col-md-8 mb-4">
                            <label for="gender"><strong>gender: <sup class="text-danger">*</sup></strong></label>
                            <select class="form-control mb-3 show-tick ms select2" name="gender" id="gender" required>
                                <option></option>
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>


                        {{-- status swich --}}
                        <div class="col-md-8 mb-4">
                            <label class="d-block"><strong>Status:</strong> </label>
                            <label class="toggle-switch">
                                <input type="checkbox" name="status" id="status">
                                <span class="toggle-switch-slider"></span>
                            </label>
                        </div>
                        {{-- button --}}
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

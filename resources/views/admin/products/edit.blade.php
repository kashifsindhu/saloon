@extends('admin.layouts.master',['navItem'=>'products'])
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
                <h5 class="d-inline">Edit Product</h5>
                <a href="{{ URL::to('/admin/products') }}" class="btn btn-primary float-right d-inline"
                    title="Back to list of FAQ's">
                    <strong>back</strong>
                </a>
            </div>

            <div class="card-body">
                <form action="{{ URL::to('/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-8 mx-auto">

                        {{-- title --}}
                        <div class="col-md-8 mb-4">
                            <label for="title"><strong>Title: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="title" id="title" required>
                        </div>

                        {{-- description --}}
                        <div class="col-md-8 mb-4">
                            <label for="description"><strong>Description :<sup class="text-danger">*</sup></strong></label>
                            <textarea name="description" id="description" cols="40" rows="4" required></textarea>

                        </div>

                        {{-- details --}}
                        <div class="col-md-8 mb-4">
                            <label for="details"><strong>Details: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="details" id="details" required>
                        </div>

                        {{-- image --}}
                        <div class="col-md-8 mb-4">
                            <label for="image"><strong>Image:</strong></label>
                            <input type="file" class="form-control mb-3" name="image" title="seelect image for blog">
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

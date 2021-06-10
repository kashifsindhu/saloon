@extends('admin.layouts.master',['navItem'=>'faqs'])
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
                <h5 class="d-inline">Edit FAQ's</h5>
                <a href="{{ URL::to('/admin/faqs') }}" class="btn btn-primary float-right d-inline"
                    title="Back to list of FAQ's">
                    <strong>back</strong>
                </a>
            </div>

            <div class="card-body">
                <form action="{{ URL::to('/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-8 mx-auto">

                        {{-- Question --}}
                        <div class="col-md-8 mb-4">
                            <label for="question"><strong>Question: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="question" id="question" required>
                        </div>
                        {{-- answer --}}
                        <div class="col-md-8 mb-4">
                            <label for="answer"><strong>Answer: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="answer" id="answer" required>
                        </div>

                        {{-- selectweb --}}
                        <div class="col-md-8 mb-4">
                            <label for="selectweb"><strong>selectweb:<sup class="text-danger">*</sup></strong></label>
                            <select class="form-control mb-3 show-tick ms select2" name="website" id="website" required>
                                <option></option>
                                <option>web 1</option>
                                <option>web 2</option>
                                <option>web 3</option>
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

@extends('admin.layouts.master',['navItem'=>'categories'])
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
                <h5 class="d-inline">Add Service</h5>
                <a href="{{ URL::to('/admin/services') }}" class="btn btn-primary float-right d-inline" name="back">
                    <strong>back</strong>
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        {{-- Category --}}
                        <div class="col-md-4">
                            <label for="category"><strong>Category:<sup class="text-danger">*</sup></strong></label>
                            <select class="form-control mb-3 show-tick ms select2" name="category" id="category" required>
                                <option></option>
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                        </div>

                        {{-- for layout alignment --}}
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>

                        {{-- Title 1 --}}
                        <div class="col-md-4 ">
                            <label for="title1"><strong>Title 1: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="title1" id="title1" >
                        </div>
                        {{-- Title 2 --}}
                        <div class="col-md-4 ">
                            <label for="title2"><strong>Title 2: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="title2" id="title2" >
                        </div>

                        {{-- Title 3 --}}
                        <div class="col-md-4 ">
                            <label for="title3"><strong>Title 3: <sup class="text-danger">*</sup></strong></label>
                            <input type="text" class="form-control mb-3" name="title3" id="title3" required>
                        </div>


                        {{-- Service description1 --}}
                        <div class="col-md-4">
                            <label for="description1"><strong>description 1:<sup
                                        class="text-danger">*</sup></strong></label>
                            <textarea name="description1" id="description1" cols="32" rows="4" required></textarea>
                        </div>
                        {{-- Service description 2 --}}
                        <div class="col-md-4">
                            <label for="description2"><strong>description 3:<sup
                                        class="text-danger">*</sup></strong></label>
                            <textarea name="description2" id="description2" cols="32" rows="4" required></textarea>

                        </div>

                        {{-- Service description3 --}}
                        <div class="col-md-4">
                            <label for="description3"><strong>description 3:<sup
                                        class="text-danger">*</sup></strong></label>
                            <textarea name="description3" id="description3" cols="32" rows="4" required></textarea>

                        </div>

                        {{-- Service Image 1 --}}
                        <div class="col-md-4">
                            <label for="image1"><strong>Service Image 1:</strong></label>
                            <input type="file" class="form-control mb-3" id="image1" name="image1">
                        </div>

                        {{-- Service Image 2 --}}
                        <div class="col-md-4">
                            <label for="image2"><strong>Service Image 2:</strong></label>
                            <input type="file" class="form-control mb-3" id="image2" name="image2">
                        </div>

                        {{-- Service Image 3 --}}
                        <div class="col-md-4">
                            <label for="image3"><strong>Service Image 3:</strong></label>
                            <input type="file" class="form-control mb-3" id="image3" name="image3">
                        </div>
                        {{-- status1 swich --}}
                        <div class="col-md-4">
                            <label class="d-block"><strong>Status:</strong> </label>
                            <label class="toggle-switch">
                                <input type="checkbox" name="status1" id="status1">
                                <span class="toggle-switch-slider"></span>
                            </label>
                        </div>

                        {{-- status2 swich --}}
                        <div class="col-md-4">
                            <label class="d-block"><strong>Status:</strong> </label>
                            <label class="toggle-switch">
                                <input type="checkbox" name="status2" id="status2">
                                <span class="toggle-switch-slider"></span>
                            </label>
                        </div>

                        {{-- status3 swich --}}
                        <div class="col-md-4">
                            <label class="d-block"><strong>Status:</strong> </label>
                            <label class="toggle-switch">
                                <input type="checkbox" name="status3" id="status3">
                                <span class="toggle-switch-slider"></span>
                            </label>
                        </div>
                    </div>

                    {{-- button --}}
                    <button type="submit" class="btn btn-primary float-right">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection

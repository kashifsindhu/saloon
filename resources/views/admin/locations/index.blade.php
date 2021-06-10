@extends('admin.layouts.master', ['navItem' => 'locations'])
@section('title', 'All Locations ')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card border">
                    <div class="header">
                        <h2><strong>Locations</strong></h2>
                        <a href="{{ URL::to('/admin/locations/create') }}" title="Go to Add New Location Page"
                            class="btn btn-primary">Add Location</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Image</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Image</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Image</td>
                                        <td>Multan</td>
                                        <td>
                                            <span class="badge badge-lg badge-pill badge-danger text-uppercase font-weight-bold">Inactive
                                            </span>
                                        </td>
                                        <td width="25%">
                                            <a href="{{ URL::to("admin/locations/1/edit") }}"
                                                    title="Edit This Category" class="btn btn-primary ">
                                                <span class="btn-inner--icon d-inline">
                                                        <i class="fa fa-edit"></i>
                                                </span>
                                            </a>
                                                <form action="{{ URL::to('admin/locations/' .'1') }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger d-inline">
                                                        <span class="btn-inner--icon">
                                                            <i class="fa fa-trash-o"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('admin.layouts.master', ['navItem' => 'workers'])
@section('title', 'All Workers ')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card border">
                    <div class="header">
                        <h2><strong>Worker</strong></h2>
                        <a href="{{ URL::to('/admin/workers/create') }}" title="Go to Add New Worker Page"
                            class="btn btn-primary">Add Worker</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>kashif</td>
                                        <td>email</td>
                                        <td>0300025484</td>
                                        <td>multn</td>
                                        <td>male</td>
                                        <td>bootay wala</td>
                                        <td>
                                            <span
                                                class="badge badge-lg badge-pill badge-danger text-uppercase font-weight-bold">Inactive
                                            </span>
                                        </td>
                                        <td width="25%">
                                            <a href="{{ URL::to('admin/workers/1/edit') }}" title="Edit This Worker"
                                                class="btn btn-primary ">
                                                <span class="btn-inner--icon d-inline">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                            </a>
                                            <form action="{{ URL::to('admin/worker/' . '1') }}" method="POST"
                                                class="d-inline">
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

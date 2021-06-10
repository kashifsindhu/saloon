@extends('admin.layouts.master', ['navItem' => 'products'])
@section('title', 'All Products ')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card border">
                    <div class="header">
                        <h2><strong>Product</strong></h2>
                        <a href="{{ URL::to('/admin/products/create') }}" title="Go to Add New products Page"
                            class="btn btn-primary">Add Product</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>laptoop</td>
                                        <td>hi quality</td>
                                        <td>56$</td>
                                        <td>image</td>
                                        <td>
                                            <span
                                                class="badge badge-lg badge-pill badge-danger text-uppercase font-weight-bold">Inactive
                                            </span>
                                        </td>
                                        <td width="25%">
                                            <a href="{{ URL::to('admin/products/1/edit') }}" title="Edit This Product"
                                                class="btn btn-primary ">
                                                <span class="btn-inner--icon d-inline">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                            </a>
                                            <form action="{{ URL::to('admin/products/' . '1') }}" method="POST"
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

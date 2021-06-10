@extends('admin.layouts.master', ['navItem' => 'blogs'])
@section('title', 'All Blogs ')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card border">
                    <div class="header">
                        <h2><strong>Blogs</strong></h2>
                        <a href="{{ URL::to('/admin/blogs/create') }}" title="Go to Add New blog Page"
                            class="btn btn-primary">Add Blog</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Details</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Details</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>image</td>
                                        <td>Village</td>
                                        <td>56$</td>
                                        <td>Description</td>
                                        <td>Details</td>
                                        <td>
                                            <span
                                                class="badge badge-lg badge-pill badge-danger text-uppercase font-weight-bold">Inactive
                                            </span>
                                        </td>
                                        <td width="25%">
                                            <a href="{{ URL::to('admin/blogs/1/edit') }}" title="Edit This FAQ"
                                                class="btn btn-primary ">
                                                <span class="btn-inner--icon d-inline">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                            </a>
                                            <form action="{{ URL::to('admin/faqs/' . '1') }}" method="POST"
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

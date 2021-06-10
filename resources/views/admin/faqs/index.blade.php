@extends('admin.layouts.master', ['navItem' => 'faqs'])
@section('title', 'All FAQs ')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card border">
                    <div class="header">
                        <h2><strong>FAQ's</strong></h2>
                        <a href="{{ URL::to('/admin/faqs/create') }}" title="Go to Add New Location Page"
                            class="btn btn-primary">Add FAQ's</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>For Web</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>For Web</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>who are u kaky?</td>
                                        <td>mein tera peoO</td>
                                        <td>todo.com</td>
                                        <td>
                                            <span class="badge badge-lg badge-pill badge-danger text-uppercase font-weight-bold">Inactive
                                            </span>
                                        </td>
                                        <td width="25%">
                                            <a href="{{ URL::to("admin/faqs/1/edit") }}"
                                                    title="Edit This FAQ" class="btn btn-primary ">
                                                <span class="btn-inner--icon d-inline">
                                                        <i class="fa fa-edit"></i>
                                                </span>
                                            </a>
                                                <form action="{{ URL::to('admin/faqs/' .'1') }}"
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


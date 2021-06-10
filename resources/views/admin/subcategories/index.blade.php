@extends('admin.layouts.master')
@section('content')

    <!-- Start Page content start -->
    <div id="page-content">
        <!-- Table Styles Header -->
        <div class="content-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="header-section">
                        <h1>{{$header}}</h1>
                    </div>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <div class="header-section">
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Admin</li>
                            <li>Categories</li>
                            <li><a href="">Index</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Table Styles Header -->

        <!-- Alert Messages Block -->
        <div class="block">
            <!-- Alert Messages Content -->
            <div class="row">
                <div class="col-sm-6 col-lg-4 mb-3">
                    <div class="card cust-bg-primary cust-rad-5">
                        <div class="card-body p-3">
                            <h1 class="h1-cust"><strong>10</strong></h1>
                            <h3 class="h3-cust">Total Sub Categories
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card cust-bg-success cust-rad-5">
                        <div class="card-body p-3">
                            <h1 class="h1-cust"><strong>8</strong></h1>
                            <h3 class="h3-cust">Active Sub Categories
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card cust-bg-danger cust-rad-5">
                        <div class="card-body p-3">
                            <h1 class="h1-cust"><strong>2</strong></h1>
                            <h3 class="h3-cust">Inactive Sub Categories
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Alert Messages Content -->
        </div>
        <!-- END Alert Messages Block -->

        <!-- Datatables is initialized in js/pages/uiTables.js -->
        <div class="block full">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <h3 class="cust-card-heading">All Sub Categories</h3>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ URL::to('/admin/subcategories/create') }}" class="btn btn-primary float-right">Add
                                Sub Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <th style="width: 20px;" class="text-center"><label
                                            class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label>
                                    </th>
                                    <th class="text-center" style="width: 50px;">ID</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th style="width: 120px;">Status</th>
                                    <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">1</td>
                                    <td><strong>AppUser1</strong></td>
                                    <td>app.user1@example.com</td>
                                    <td><span class="label label-info">On hold..</span></td>
                                    <td class="text-center">
                                        <form action="{{ route('subcategories.edit',1)}}" method="GET">
                                            @csrf
                                            <button  data-toggle="tooltip" title="Edit Sub Category"
                                               class="btn btn-effect-ripple btn-xs btn-success"><i
                                                        class="fa fa-pencil"></i></button>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                               class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                        </form>


                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">2</td>
                                    <td><strong>AppUser2</strong></td>
                                    <td>app.user2@example.com</td>
                                    <td><span class="label label-success">Active</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">3</td>
                                    <td><strong>AppUser3</strong></td>
                                    <td>app.user3@example.com</td>
                                    <td><span class="label label-danger">Disabled</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">4</td>
                                    <td><strong>AppUser4</strong></td>
                                    <td>app.user4@example.com</td>
                                    <td><span class="label label-info">On hold..</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">5</td>
                                    <td><strong>AppUser5</strong></td>
                                    <td>app.user5@example.com</td>
                                    <td><span class="label label-info">On hold..</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">6</td>
                                    <td><strong>AppUser6</strong></td>
                                    <td>app.user6@example.com</td>
                                    <td><span class="label label-success">Active</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">7</td>
                                    <td><strong>AppUser7</strong></td>
                                    <td>app.user7@example.com</td>
                                    <td><span class="label label-warning">Pending..</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">8</td>
                                    <td><strong>AppUser8</strong></td>
                                    <td>app.user8@example.com</td>
                                    <td><span class="label label-danger">Disabled</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">9</td>
                                    <td><strong>AppUser9</strong></td>
                                    <td>app.user9@example.com</td>
                                    <td><span class="label label-success">Active</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">10</td>
                                    <td><strong>AppUser10</strong></td>
                                    <td>app.user10@example.com</td>
                                    <td><span class="label label-success">Active</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">11</td>
                                    <td><strong>AppUser11</strong></td>
                                    <td>app.user11@example.com</td>
                                    <td><span class="label label-info">On hold..</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">12</td>
                                    <td><strong>AppUser12</strong></td>
                                    <td>app.user12@example.com</td>
                                    <td><span class="label label-success">Active</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">13</td>
                                    <td><strong>AppUser13</strong></td>
                                    <td>app.user13@example.com</td>
                                    <td><span class="label label-info">On hold..</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input
                                                type="checkbox"><span></span></label></td>
                                    <td class="text-center">30</td>
                                    <td><strong>AppUser30</strong></td>
                                    <td>app.user30@example.com</td>
                                    <td><span class="label label-danger">Disabled</span></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User"
                                            class="btn btn-effect-ripple btn-xs btn-success"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User"
                                            class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Datatables Block -->
    </div>
    <!-- End Page content -->

@endsection

@section('customScripts')
    <!-- Load and execute javascript code used only in this page -->
    <script src="js/pages/uiTables.js"></script>
    <script>
        $(function() {
            UiTables.init();
        });

    </script>
@endsection

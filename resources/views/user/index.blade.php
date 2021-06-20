@extends('layouts.app', [ 'title'=>'Users' ])
@section('breadcrumb')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">List of Users</h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>DP</th>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>George Maduga <span class="feather-icon"><i data-feather="check-circle"
                                                        style="color: green;"></i></span></td>
                                            <td>georgemaduga34@gmail.com</td>
                                            <td>
                                                <form action="" method="post">
                                                    <select name="status" id="status">
                                                        <option value="unverified">Unverified</option>
                                                        <option selected value="verified">Verified</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>
                                                <img src="https://via.placeholder.com/50" alt="user"
                                                    class="avatar-img rounded-circle">
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i
                                                        class="icon-trash txt-danger"></i> </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

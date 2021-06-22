@extends('layouts.app', [ 'title'=>'Ward' ])
@section('breadcrumb')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wards</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
@endsection
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Wards</h5>
                <p class="mb-40">List of wards registered in the system <br> <a class="btn btn-gold mt-2 mr-2"
                        href="{{ route('ward.create') }}">Add Ward</a></p>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="datable_1" class="table table-hover w-100 display pb-30">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        
                                        
                                        <th>Coordinates</th>
                                        
                                        
                                        <th>Activation Code</th>
                                        <th>Activation Code Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($wards as $item)
                                        <tr>
                                            <td>0</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->coordinates }}</td>
                                            <td>{{ $item->activation_code }}</td>
                                            <td>
                                                {{ $item->activation_code_status_a }}
                                            </td>
                                            <td>
                                                {{ $item->status_a }}
                                            </td>
                                            <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="icon-pencil"></i> </a>
                                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i
                                                        class="icon-trash txt-danger"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Coordinates</th>
                                        <th>Activation Code</th>
                                        <th>Activation Code Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
@endsection
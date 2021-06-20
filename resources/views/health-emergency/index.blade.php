@extends('layouts.app', [ 'title'=>'Health Emergency' ])
@section('breadcrumb')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Health Emergency</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Health Emergency</h5>
                {{-- <p class="mb-40">Events List <br> <a class="btn btn-gold mt-2 mr-2"
                        href="{{ route('event.create') }}"></a> </p> --}}
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Note</th>
                                            <th>Media</th>
                                            <th>Coordinates</th>
                                            <th>Environment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0</td>
                                            <td>Lunar probe project</td>
                                            <td>Lunar probe project</td>
                                            <td>Lunar probe project</td>
                                            <td>
                                                <a href="{{ route('environment-status') }}" class="mr-25">
                                                   <span class="feather-icon"></span> <i data-feather="layers"></i> </a>
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

@extends('layouts.app', [ 'title'=>'Environment Status' ])
@section('breadcrumb')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Environment Status</li>
            <li class="breadcrumb-item active" aria-current="page">Coordinates</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 pa-0">
            <div class="tab-content mt-sm-60 mt-30">
                <div class="tab-pane fade show active" role="tabpanel">
                    <div class="container">
                        <div class="hk-row">
                            <div class="col-lg-8">
                                <div class="card card-profile-feed">
                                    <div class="card-header card-header-action">
                                        <div class="media align-items-center">
                                            <div class="media-img-wrap d-flex mr-10">
                                                <div class="avatar avatar-sm">
                                                    <img src="dist/img/avatar2.jpg" alt="user"
                                                        class="avatar-img rounded-circle">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-capitalize font-weight-500 text-dark">Madelyn Rascon</div>
                                                <div class="font-13">25 min</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mb-30">There was that time artists at Sequence opted to
                                            hand-Sharpie the
                                            lorem ipsum passage on a line of paper bags they designed for Chipotle.</p>
                                        <div class="card">
                                            <div class="position-relative">
                                                <img class="card-img-top d-block" src="https://via.placeholder.com/150" alt="Card image cap">
                                                <a href="#"
                                                    class="btn btn-dark btn-wth-icon icon-wthot-bg btn-rounded btn-pg-link"><span
                                                        class="icon-label"><i class="ion ion-md-link"></i></span><span
                                                        class="btn-text">website</span></a>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Bacon chicken turducken spare ribs.</h5>
                                                <p class="card-text">Of course, we'd be remiss not to include the veritable
                                                    cadre of
                                                    lorem ipsum knock offs featuring: Bacon Ipsum, Hipster Ipsum, Corporate
                                                    Ipsum,
                                                    Legal Ipsum.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app', [ 'title'=>'Posts' ])
@section('breadcrumb')
     <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Posts</li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">Create Competition</li> --}}
                </ol>
            </nav>
            <!-- /Breadcrumb -->
@endsection
@section('content')
    <div class="row">
      <div class="col-xl-12">
        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Posts</h5>
                            <p class="mb-40">Posts List <br> <a class="btn btn-gold mt-2 mr-2" href="{{ route('post.create') }}">Create a post</a> </p>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Title</th>
                                                        <th>Content</th>
                                                        <th>Photo</th>
                                                        <th>Status</th>
                                                        <th>Date Updated</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <td>0</td>
                                                        <td>Lunar probe project</td>
                                                        <td>Lunar probe project</td>
                                                        <td>Lunar probe project</td>
                                                        <td>Lunar probe project</td>
                                                        <td>May 15, 2015</td>
                                                        <td>
                                                            <a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                            <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="icon-trash txt-danger"></i> </a>
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
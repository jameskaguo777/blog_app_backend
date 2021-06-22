@extends('layouts.app', [ 'title'=>'Create Event' ])
@section('breadcrumb')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"> <a href="{{ route('events') }}">Event</a> </li>
            <li class="breadcrumb-item active" aria-current="page">Create Event</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Create Event</h5>
                <p class="mb-25">Fill the form below to create an event</p>
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('event.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputTitle" name="title"
                                        placeholder="Enter Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" required id="inputDate" name="date"
                                        placeholder="Enter Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control custom-select d-block w-100" required name="status"
                                        id="status">
                                        <option value="1">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="form-group row ml-2">
                                           <label for="inputImageUpload" class="col-form-label">Upload Image</label>
                                           <input id="inputImageUpload" name="image_url" type="file" class="form-control ml-4 mr-4">
                                        </div> --}}

                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label" for="inputContent">
                                    Content
                                </label>
                                <div class="col-sm-10">
                                    <div id="inputContent" class="tinymce-wrap">
                                        <textarea name="content" class="tinymce"></textarea>
                                    </div>
                                </div>

                            </div>
                            <!-- /Row -->
                            <div class="form-group row mb-0">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('js')
    <!-- Tinymce JavaScript -->
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <!-- Tinymce Wysuhtml5 Init JavaScript -->
    <script src="{{ asset('assets/dist/js/tinymce-data.js') }}"></script>
@endpush

@extends('layouts.app', [ 'title'=>'Create Post' ])
@section('breadcrumb')
     <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="{{ route('posts') }}">Posts</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
@endsection
@section('content')
     <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Create Post</h5>
                            <p class="mb-25">Fill below to create a post</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" required id="inputTitle" name="title" placeholder="Enter Title">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-control custom-select d-block w-100" required name="status" id="status">
                                                    <option value="1">Published</option>
                                                    <option value="0">Unpublished</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row ml-2">
                                           <label for="inputImageUpload" class="col-form-label">Upload Image</label>
                                           <input id="inputImageUpload" name="image" type="file" class="form-control ml-4 mr-4">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm">
                                                <label class="col-form-label" for="inputContent">
                                                    Content
                                                    <div id="inputContent" class="tinymce-wrap">
                                                        <textarea name="content" class="tinymce"></textarea>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                <!-- /Row -->
                                        {{-- <fieldset class="form-group mb-15">
                                            <div class="row">
                                                <label class="col-form-label col-sm-2 pt-0">Radios</label>
                                                <div class="col-sm-10">
                                                    <div class="custom-control custom-radio mb-5">
                                                        <input id="option_1" name="optionHorizontal" class="custom-control-input" checked="" type="radio">
                                                        <label class="custom-control-label" for="option_1">Option 1</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-5">
                                                        <input id="option_2" name="optionHorizontal" class="custom-control-input" type="radio">
                                                        <label class="custom-control-label" for="option_2">Option 2</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="option_3" name="optionHorizontal" class="custom-control-input" type="radio">
                                                        <label class="custom-control-label" for="option_3">Option 3</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset> --}}
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
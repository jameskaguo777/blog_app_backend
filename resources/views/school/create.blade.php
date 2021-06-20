@extends('layouts.app', [ 'title'=>'Add School' ])
@section('breadcrumb')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('schools') }}">School</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add School</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Add School</h5>
                <p class="mb-25">Fill below to add a school</p>
                <div class="row">
                    <div class="col-sm">
                        <form method="POST" action="{{ route('school.store') }}">
                          @csrf
                            <div class="form-group row">
                                <label for="input-name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="input-name" name="name"
                                        placeholder="Enter School Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="input-phone" name="phone"
                                        placeholder="Enter Phone Number">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="input-address" name="address"
                                        placeholder="Enter Address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-coordinates" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">
                                    <input type="text" step="any" class="form-control" required id="input-latitude"
                                        name="latitude" placeholder="Enter Latitude">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-coordinates" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-10">
                                    <input type="text" step="any" class="form-control" required id="input-longitude"
                                        name="longitude" placeholder="Enter Longitude">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-built-year" class="col-sm-2 col-form-label">Built Year</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1800" max="2099" value="2000" class="form-control" required id="input-built-year" name="built_year"
                                        placeholder="Enter School Built Year">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-activation-code" class="col-sm-2 col-form-label">Activation Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" required id="input-activation-code"
                                        name="activation_code" placeholder="Enter OR Generate Activation Code">
                                </div>
                                <div class="col-sm-2"><a id="generate-button" class="btn btn-red" style="color: white;">Generate</a>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row mb-0">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add</button>
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
    <script>
        function rand(min, max) {
            let randomNum = Math.random() * (max - min) + min;
            return Math.round(randomNum);
        }


        var generateColor = function() {
            // hex numbers 
            var hex = ['a', 'b', 'c', 'd', 'e', 'f', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            var color = '#';
            // we will generate hex color with 6 digit length
            for (var i = 0; i < 6; i++) {
                let index = rand(0, 15);
                // Append hex value at the index
                color += hex[index];
            }
            return color;
        };
        console.log(generateColor());
        $('#generate-button').click(function() {
            var inputActivationCode = document.getElementById('input-activation-code').value = generateColor();
        });

    </script>
@endpush

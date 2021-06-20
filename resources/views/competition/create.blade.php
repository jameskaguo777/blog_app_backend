@extends('layouts.app', [ 'title'=>'Create Competition' ])
@section('breadcrumb')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"> <a href="{{ route('competitions') }}">Competitions</a> </li>
            <li class="breadcrumb-item active" aria-current="page">Create Competition</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Create Competition</h5>
                <p class="mb-25">Create competition by filling below form</p>
                <div class="row">
                    <div class="col-sm">
                        <form method="POST" action="{{ route('competition.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="target" class="col-sm-2 col-form-label">Target</label>
                                <div class="col-sm-10">
                                    <select id="selectTarget" class="form-control custom-select d-block w-100" required
                                        name="target" id="target">
                                        <option selected disabled value="">Select Target</option>
                                        <option value="schools">Schools</option>
                                        <option value="wards">Wards</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTheme" class="col-sm-2 col-form-label">Theme</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputTheme" name="theme"
                                        placeholder="Enter Theme">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputChallenge" class="col-sm-2 col-form-label">Challenge</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputChallenge" name="challenge"
                                        placeholder="Enter Challenge">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputCriteria" class="col-sm-2 col-form-label">Criteria</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputCriteria" name="criteria"
                                        placeholder="Enter Criteria">
                                </div>
                            </div>

                            <div id="divGeoLocked" class="form-group row">
                                <label for="geoLocked" class="col-sm-2 col-form-label">Geo Locked</label>
                                <div class="col-sm-10">
                                    <select class="form-control custom-select d-block w-100" required name="geo_locked"
                                        id="selectGeoLocked">
                                        <option selected disabled value="">Is Geo Locked</option>
                                        <option value=1>True</option>
                                        <option value=0>False</option>
                                    </select>
                                </div>
                            </div>

                            <div id="divLatitude" class="form-group row">
                                <label for="inputLatitude" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" class="form-control" id="inputLatitude" name="latitude"
                                        placeholder="Enter Latitude">
                                </div>
                            </div>

                            <div id="divLongitude" class="form-group row">
                                <label for="inputLongitude" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" class="form-control" id="inputLongitude"
                                        name="longitude" placeholder="Enter Longitude">
                                </div>
                            </div>

                            <div class="form-group row" id="divRadius">
                                <label for="inputRadius" class="col-sm-2 col-form-label">Radius</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputRadius" name="radius"
                                        placeholder="Enter Radius the unit is in Km">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputReward" class="col-sm-2 col-form-label">Reward</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required id="inputReward" name="reward"
                                        placeholder="Enter Reward">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputStartDate" class="col-sm-2 col-form-label">Start date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" required id="inputStartDate" name="start_date"
                                        placeholder="Enter Start Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEndDate" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" required id="inputEndDate" name="end_date"
                                        placeholder="Enter End Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputImageUpload" class="col-sm-2 col-form-label">Upload Image</label>
                                <div class="col-sm-10">
                                    <input id="inputImageUpload" name="image_url" type="file" class="form-control">
                                </div>
                            </div>
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
    <script>
        // var target = document.getElementById('selectTarget');
        // console.log(target);
        $('#selectTarget').change(function() {
            var target = document.getElementById('selectTarget');
            console.log(target.value);
            // console.log(target);
            if (target.value == 'schools') {
                // document.getElementById('inputLatitude').setAttribute('disabled', true);
                // document.getElementById('inputLongitude').setAttribute('disabled', true);
                // document.getElementById('divLatitude').style.display='none';
                // document.getElementById('divLongitude').style.display='none';
                $('#inputLatitude').prop('required', false);
                $('#inputLongitude').prop('required', false);
                $('#inputRadius').prop('required', false);
                $('#selectGeoLocked').prop('required', false);
                $('#divLatitude').hide();
                $('#divLongitude').hide();
                $('#divRadius').hide();
                $('#divGeoLocked').hide();
            } else {
                // document.getElementById('inputLatitude').prop('disabled', false);
                // document.getElementById('inputLongitude').prop('disabled', false);
                // document.getElementById('divLatitude').style.display='inline';
                // document.getElementById('divLongitude').style.display='inline';
                $('#divGeoLocked').show();
                $('#selectGeoLocked').prop('required', true);
                // $('#divLatitude').hide();
                // $('#divLongitude').hide();
                // $('#divRadius').hide();
                // $('#inputLatitude').prop('required', false);
                // $('#inputLongitude').prop('required', false);
                // $('#inputRadius').prop('required', false);
                $('#selectGeoLocked').change(function() {
                    var selectGeoLocked = document.getElementById('selectGeoLocked').value;
                    console.log(selectGeoLocked);
                    if (selectGeoLocked == 1) {
                        $('#divLatitude').show();
                        $('#divLongitude').show();
                        $('#divRadius').show();
                        $('#inputLatitude').prop('required', true);
                        $('#inputLongitude').prop('required', true);
                        $('#inputRadius').prop('required', true);
                    } else {
                        $('#divLatitude').hide();
                        $('#divLongitude').hide();
                        $('#divRadius').hide();
                        $('#inputLatitude').prop('required', false);
                        $('#inputLongitude').prop('required', false);
                        $('#inputRadius').prop('required', false);
                    }
                });
            }


        });

        Date.prototype.addDays = function(days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        }

        $('#inputEndDate').change(function() {
            var start_date = document.getElementById('inputStartDate').value;
            var end_date = document.getElementById('inputEndDate').value;
            var d_start_date = new Date(start_date);
            var d_end_date = new Date(end_date);

            if (d_start_date > d_end_date) {
                alert('Please set end date to be greater than beginning date');
                var new_end_date = d_start_date.addDays(30);
                let ye = new Intl.DateTimeFormat('en', {
                    year: 'numeric'
                }).format(new_end_date);
                let mo = new Intl.DateTimeFormat('en', {
                    month: 'numeric'
                }).format(new_end_date);
                let da = new Intl.DateTimeFormat('en', {
                    day: '2-digit'
                }).format(new_end_date);
                document.getElementById("inputEndDate").valueAsDate = new Date(new_end_date);
                console.log(`${mo}/${da}/${ye}`);
            } else {

            }
        });

    </script>
@endpush

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
                                    <form>
                                        <div class="form-group row">
                                            <label for="target" class="col-sm-2 col-form-label">Target</label>
                                            <div class="col-sm-10">
                                                <select class="form-control custom-select d-block w-100" required name="target" id="target">
                                                    <option value="schools">Schools</option>
                                                    <option value="wards">Wards</option>
                                                    <option value="all">All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputTheme" class="col-sm-2 col-form-label">Theme</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" required id="inputTheme" name="theme" placeholder="Enter Theme">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputChallenge" class="col-sm-2 col-form-label">Challenge</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" required id="inputChallenge" name="challenge" placeholder="Enter Challenge">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputCriteria" class="col-sm-2 col-form-label">Criteria</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" required id="inputCriteria" name="criteria" placeholder="Enter Criteria">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputReward" class="col-sm-2 col-form-label">Reward</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" required id="inputReward" name="reward" placeholder="Enter Reward">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputStartDate" class="col-sm-2 col-form-label">Start date</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" required id="inputStartDate" name="start_date" placeholder="Enter Start Date">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEndDate" class="col-sm-2 col-form-label">End Date</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" required id="inputEndDate" name="end_date" placeholder="Enter End Date">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                           <label for="inputImageUpload" class="col-sm-2 col-form-label">Upload Image</label>
                                           <input id="inputImageUpload" name="image" type="file" class="form-control ml-4 mr-4">
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
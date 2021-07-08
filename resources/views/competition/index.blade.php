@extends('layouts.app', [ 'title'=>'Competitions' ])
@section('breadcrumb')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Competitions</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Competitions</h5>
                <p class="mb-40">Competitions List <br> <a class="btn btn-gold mt-2 mr-2"
                        href="{{ route('competition.create') }}">Create a competition</a> <a
                        class="btn btn-gradient-ashes mt-2 mr-2"
                        href="{{ route('competitions.notification.create') }}">Send Notifications</a> </p>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Theme</th>
                                            <th>Challenge</th>
                                            <th>Criteria</th>
                                            <th>Target</th>
                                            <th>Reward</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Last Updated</th>
                                            <th>Geo Locked</th>
                                            <th>Coordinates</th>
                                            <th>Radius</th>
                                            <th>Featured Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($competitions as $item)
                                            <tr>
                                                <td>0</td>
                                                <td>{{ $item->theme }} <br> @if ($item->status)
                                                    <span class="feather-icon"><i data-feather="check-circle"
                                                        style="color: green;"></i></span>
                                                @else
                                                    <span class="feather-icon"><i data-feather="check-circle"
                                                        style="color: red;"></i></span>
                                                @endif</td>
                                                <td>{{ $item->challenge }}</td>
                                                <td>{{ $item->criteria }}</td>
                                                <td>{{ $item->reward }}</td>
                                                <td>{{ $item->target }}</td>
                                                <td>{{ $item->start_date }}</td>
                                                <td>
                                                    {{ $item->end_date }}
                                                    <br>
                                                    {{-- {{ $item->remaining_days_percentage }} --}}
                                                    <div class="progress progress-bar-xs mb-0 ">
                                                        <div class="progress-bar progress-bar-danger" style="width: {{ $item->time_spended['time_spended_in_percentage'] }}%">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->geo_locked_a }}</td>
                                                <td>{{ $item->coordinates }}</td>
                                                <td>{{ $item->radius }}</td>
                                                <td><img src="{{ Storage::url($item->image_url) }}" alt="user"
                                                    class="avatar-img rounded-circle"></td>
                                                <td>
                                                    <a href="#" class="mr-25" data-toggle="tooltip"
                                                        data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                    <a href="#" data-toggle="tooltip" data-original-title="Close"> <i
                                                            class="icon-trash txt-danger"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach


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

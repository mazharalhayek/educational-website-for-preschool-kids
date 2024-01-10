@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">My Students</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Progress Report</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
<!-- center container -->
    <div class="container-fluid">
                <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-text">Progress</h6>
                        <br>
                        <!-- progress bars -->
                        <div class = "container">

                            <span> Quizzes </span>
                            <div class="progress mg-b-10">
                                @foreach ($student as $progress)
                                    @if ($progress->role == "quize")
                                        <div class="progress-bar bg-success" role="progressbar" style="width:{{ $progress->grade }}% " aria-valuenow="{{ $progress->grade }}" aria-valuemin="0" aria-valuemax="100">{{ $progress->grade }}</div>
                                    @endif
                            @endforeach
                            </div>
                            <br>
                            <span> Lessons </span>
                            <div class="progress mg-b-10">
                                @foreach ($student as $progress)
                                    @if ($progress->role == "lesson")
                                        <div class="progress-bar bg-success" role="progressbar" style="width:{{ $progress->grade }}% " aria-valuenow="{{ $progress->grade }}" aria-valuemin="0" aria-valuemax="100">{{ $progress->grade }}</div>
                                    @endif
                                @endforeach
                            </div>
                            <br>
                            <span> Books </span>
                            <div class="progress mg-b-10">
                                @foreach ($student as $progress)
                                    @if ($progress->role == "book")
                                        <div class="progress-bar bg-success" role="progressbar" style="width:{{ $progress->grade }}% " aria-valuenow="{{ $progress->grade }}" aria-valuemin="0" aria-valuemax="100">{{ $progress->grade }}</div>
                                    @endif
                                @endforeach
                            </div>
                            <br>
                        </div>
                        <!-- drop down button -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              More details
                            </button>
                            <!-- dropdown container -->
                            <div class="dropdown-menu p-4 text-muted" style="max-width: 800px;">
                                <p>
                                  Some example text that's free-flowing within the dropdown menu.
                                </p>
                                <p class="mb-0">
                                  And this is more example text.
                                </p>
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
@section('js')
@endsection

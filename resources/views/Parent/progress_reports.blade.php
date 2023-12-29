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
                <h4 class="content-title mb-0 my-auto">Apps</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Children
                    Progress Reports</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
<!-- center container -->
    <div class="container-fluid">
        @php $count = 0; @endphp
        @foreach ($childs as $child)
            @if ($count % 3 == 0)
                <div class="row">
            @endif

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $child->name }}</h5>
                        <h6 class="card-text">Progress</h6>
                        <br>
                        <!-- progress bars -->
                        <div class = "container">
                            <span> Quizzes </span>
                            <div class="progress">

                                <div class="progress-bar bg-success" role="progressbar" style="width: 0%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <br>
                            <span> Lessons </span>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <br>
                            <span> Books </span>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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

            @php $count++; @endphp

            @if ($count % 3 == 0 || $loop->last)
    </div>
    @endif
    @endforeach
    </div>

    </div>
    </div>
    </div>
@endsection
@section('js')
@endsection

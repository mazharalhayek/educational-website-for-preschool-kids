@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <style>
        form {
            font-family: "Inter", sans-serif;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">My children</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Create child account</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->

    <form method="POST" action="{{ route('Parent.storechild') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">create Child account</h4>
                    <p class="mb-2">enter your child info here</p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="number" min="0" max="8" class="form-control" id="inputEmail3"
                                placeholder="Age" name="age" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                name="password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password"
                                name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Select a pic of your child (optional)</label>
                            <input type="file" class="form-control" id="childpic" placeholder="select a pic"
                                name="image">
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div><img src="{{ asset('images/Collage—Girl3.png') }}" width="400px" align="left" style="margin-top:-410px">
        </div>
    </form>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@endsection

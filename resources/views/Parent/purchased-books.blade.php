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
                <h4 class="content-title mb-0 my-auto">Books</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ My
                    Books</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- center container -->
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($purchased_books as $item)
                <div class="col">
                    <div class="card h-50" style="min-height: 400px">
                        <img src="{{ asset('storage/' . $item->Cover) }}" class="card-img-top" alt="..."
                            style="height: 50%">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <h6 class="card-text">{{ $item->author }}</h6>
                            <p class="card-text" style="min-height: 40%">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
@section('js')
@endsection

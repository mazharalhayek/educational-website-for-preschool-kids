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
                            <a href="#review" data-toggle="modal" style="margin-right: 6.5vw">
                                <button class="btn btn-primary" type="button">⭐️</button>
                            </a>
                            <div id="review" class="modal fade">
                                <div class="modal-dialog custom-modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('Parent.review',$item->id)}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <div class="modal-header">
                                                <h4 class="modal-title">Give a review</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="image">The review must be betwee 1 -> 5</label>
                                                        <input type="number" class="form-control"
                                                               placeholder="enter a number" name="review">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal"
                                                       value="Cancel">
                                                <input type="submit" class="btn btn-success"
                                                       onclick="showNotification('Category updated successfly')"
                                                       value="Apply">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

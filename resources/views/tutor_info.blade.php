@extends('layouts.master')
@section('css')
    <!--Internal  Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Tutors</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Info</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <form action="{{route('Parent.hire_a_tutor',$specific_tutor->id)}}" method="POST">
        @csrf
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body h-100">
                        <div class="row row-sm ">
                            <div class=" col-xl-5 col-lg-12 col-md-12">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1"><img src="{{asset($specific_tutor->image)}}"
                                                                                 alt="image"/></div>
                                </div>
                            </div>
                            <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                <h4 class="product-title mb-1">{{$specific_tutor->name}}</h4>
                                <p class="text-muted tx-13 mb-1">{{$specific_tutor->subject}}</p>
                                <div class="rating mb-1">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star text-muted"></span>
                                        <span class="fa fa-star text-muted"></span>
                                    </div>
                                    <span class="review-no">41 reviews</span>
                                </div>
                                <h6 class="price">current price (Monthly): <span
                                        class="h3 ml-2">${{$specific_tutor->salary}}</span></h6>
                                <p class="product-description">{{$specific_tutor->qualifications}}</p>
                                <p class="vote"><strong>(87 votes) 91%</strong> of buyers enjoyed this product </p>
                                <div class="action">
                                    <table>
                                        <tr>
                                            @foreach ($which_child as $child)
                                                <th style="padding:10px">
                                                    <button class="add-to-cart btn btn-success" name="child_id"
                                                            type="submit" value="{{$child->id}}">Hire
                                                        for {{$child->name}}</button>
                                                </th>
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
        <!-- row closed -->
        </div>
        <!-- Container closed -->
        </div>
        <!-- main-content closed -->
    </form>
@endsection
@section('js')
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection

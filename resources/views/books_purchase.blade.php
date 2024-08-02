@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Ecommerce</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Products</span>
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
    <div class="card">
        <div class="card-body p-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search ...">
                <span class="input-group-append">
                    <button class="btn btn-primary" type="button">Search</button>
                </span>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->  
    @foreach ($books->chunk(4) as $chunk)
        <div class="row row-sm">
            @foreach ($chunk as $item)
                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pro-img-box">
                                            <img class="w-100" src="{{ asset('storage/' . $item->Cover) }}"
                                                alt="product-image">
                                            <a href="#" class="adtocart">
                                                <i class="las la-shopping-cart "></i>
                                            </a>
                                        </div>
                                        <div class="text-center pt-3">
                                            <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $item->title }}
                                            </h3>
                                            <h5 class="h6 mb-2 mt-4 text-uppercase">{{ $item->author }}</h5><br>
                                            <h7 class="h6 mb-2 mt-4 text-uppercase">{{ $item->description }}</h7><br>
                                            <span class="tx-15 ml-auto">
                                                @for ($i = 0; $i < floor($item->rating); $i++)
                                                    <i class="ion ion-md-star text-warning"></i>
                                                @endfor
                                                @if ($item->rating == ceil($item->rating))
                                                    <i class="ion ion-md-star-half text-warning"></i>
                                                @endif
                                                @for ($i = 0; $i < 5 - floor($item->rating); $i++)
                                                    <i class="ion ion-md-star-outline text-warning"></i>
                                                @endfor
                                            </span>
                                            <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">
                                                ${{ $item->price }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
            @endforeach
        </div>
    @endforeach


@endsection
@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
@endsection

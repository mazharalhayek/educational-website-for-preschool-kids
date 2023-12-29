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
                <h4 class="content-title mb-0 my-auto">Apps</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Buy
                    Books</span>
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
    <div class = "container-fluid">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="images\books\what-the-ladybird-heard-at-the-seaside.jpg" class="card-img-top" alt="..."
                        style="height: 65%">
                    <div class="card-body">
                        <h5 class="card-title">What the Ladybird Heard at the Seaside</h5>
                        <h6 class="card-text">Julia Donaldson
                            & Lydia Monks</h6>
                        <p class = "card-text" style="min-height: 40%"> Join everyone's favourite crime-busting ladybird on a trip to the seaside!
                        </p>
                        <!-- Button trigger modal -->
                        <div style="display:flex; gap: 1rem;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Purchase
                        </button>
                        <p style="font-size: 1rem; font-weight: 500;"> 9.99$ </p>
                            </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Purchase</h5>
                                    </div>
                                    <div class="modal-body">
                                        ?Are you sure you want to buy this book
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Confirm Purchase</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="images\books\what-the-ladybird-heard-at-the-seaside.jpg" class="card-img-top" alt="..."
                        style="height: 65%">
                    <div class="card-body">
                        <h5 class="card-title">What the Ladybird Heard at the Seaside</h5>
                        <h6 class="card-text">Julia Donaldson
                            & Lydia Monks</h6>
                        <p class = "card-text" style="min-height: 40%"> Join everyone's favourite crime-busting ladybird on a trip to the seaside!
                        </p>
                        <div style="display:flex; gap: 1rem;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Purchase
                        </button>
                        
                        <p style="font-size: 1rem; font-weight: 500;"> 9.99$ </p>
                            </div>
                    

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel"> Purchase</h5>
                                 </div>
                                 <div class="modal-body">
                                     ?Are you sure you want to buy this book
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary"
                                         data-bs-dismiss="modal">Close</button>
                                     <button type="button" class="btn btn-primary">Confirm Purchase</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="images\books\lost-and-found.jpeg" class="card-img-top" alt="..." style="height: 65%">
                    <div class="card-body">
                        <h5 class="card-title">Lost and Found</h5>
                        <h6 class="card-text">Oliver Jeffers</h6>
                        <p class = "card-text">This is the endearing story of a boy and the journey he undertakes to return
                            a lost penguin back to its home. This simple story with beautiful illustrations has also been
                            made into an animated movie. </p>
                             <!-- Button trigger modal -->
                        <div style="display:flex; gap: 1rem;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Purchase
                    </button>
                    <p style="font-size: 1rem; font-weight: 500;"> 9.99$ </p>
                        </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Confirm Purchase</h5>
                                </div>
                                <div class="modal-body">
                                    ?Are you sure you want to buy this book
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Confirm Purchase</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="images\books\the-rabbit-the-dark-and-the-biscuit-tin.jpeg" class="card-img-top"
                        alt="..." style="height: 65%">
                    <div class="card-body">
                        <h5 class="card-title">The Rabbit, The Dark and the Biscuit Tin</h5>
                        <h6 class="card-text">Nicola O'Byrne</h6>
                        <p class = "card-text"> If bedtime is a battle, then this hilarious, inventive picture book from
                            international bestseller, Nicola O'Byrne, is exactly what you need</p>
                             <!-- Button trigger modal -->
                             <div style="display:flex; gap: 1rem;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Purchase
                            </button>
                            <p style="font-size: 1rem; font-weight: 500;"> 9.99$ </p>
                                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Purchase</h5>
                                </div>
                                <div class="modal-body">
                                    ?Are you sure you want to buy this book
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary"> Confirm Purchase</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="images\books\how-do-you-make-a-rainbow.jpeg" class="card-img-top" alt="..."
                        style="height: 65%">
                    <div class="card-body">
                        <h5 class="card-title">?How Do You Make a Rainbow</h5>
                        <h6 class="card-text">Caroline Crowe
                            & Cally Johnson-Isaacs
                        </h6>
                        <p class = "card-text"> A joyful picturebook tapping into the power of finding positivity in the
                            world around us.</p>
                             <!-- Button trigger modal -->
                             <div style="display:flex; gap: 1rem;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Purchase
                            </button>
                            <p style="font-size: 1rem; font-weight: 500;"> 9.99$ </p>
                                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Purchase</h5>
                                </div>
                                <div class="modal-body">
                                    ?Are you sure you want to buy this book
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Confirm Purchase</button>
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

    </div>
    </div>
    </div>
@endsection
@section('js')
@endsection

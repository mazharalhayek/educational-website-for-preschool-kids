@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .card {
            width: 7cm;
            height: 8cm;
        }

        .card-img-top {
            width: 3cm;
            height: 3cm;
        }

        .line {
            border: none;
            height: 2px;
            background-color: #333;
        }

        .custom-modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
        }
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">My children</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    @foreach ($childs->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk as $child)
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ asset($child->image) }}"
                                onerror="this.onerror=null;this.src='{{ asset('images/kids3.png') }}';">
                            <br>
                            <hr class="line">
                            <h4 class="card-title mb-3">Name: {{ $child->name }}</h4>
                            <h4 class="card-title mb-3">Age: {{ $child->age }}</h4>
                            <table class = "mx-auto">
                                <tr>
                                    <td colspan="3"><a class="btn btn-primary w-100"
                                            href="{{ route('child_interface', $child->id) }}">LogIn</a></td>
                                </tr>
                                <tr>
                                    <th><a class="btn btn-warning" href="#editchild" title="Edit Account"
                                            data-placement="bottom" data-toggle="modal"><i
                                                class="fas fa-pencil-alt"></i></a></th>
                                    <th><a class="btn btn-dark" href="{{ route('Parent.hired_tutors', $child->id) }}">Check
                                            tutors</a></th>
                                    <th><a class="btn btn-danger ripple"
                                            href="{{ route('Parent.child_remove', $child->id) }}" title="Remove Account"
                                            id="swal-warning" data-placement="bottom" data-toggle="tooltip"><i
                                                class="fas fa-trash-alt"></i></a></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                 {{-- Edit child info frame --}}
    <div id="editchild" class="modal fade">
        <div class="modal-dialog custom-modal-dialog">
            <div class="modal-content">
                <form action="{{route('Parent.updatechild',$child->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit child info</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$child->name}}" required>
                            </div>
                            <div class="form-group">
                                <input type="number"  min="0" max="8" class="form-control" id="inputEmail3" placeholder="Age" name="age" value="{{$child->age}}" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" value="{{$child->password}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" name="password_confirmation" value="{{$child->password}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="image">Select a pic of your child (optional)</label>
                                <input type="file" class="form-control" id="childpic" placeholder="select a pic" value="{{$child->image}}" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success"
                            onclick="showNotification('Category updated successfly')" value="Apply">
                    </div>
                </form>
            </div>
        </div>
    </div>
            @endforeach
        </div>
    @endforeach
    </div>
</div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/rating/ratings.js') }}"></script>
    <!--Internal  Sweet-Alert js-->
    <script src="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script>
    <!-- Sweet-alert js  -->
    <script src="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/sweet-alert.js') }}"></script>
    <script>
        function refreshPage() {
            // Reload the current page
            window.location.reload();
        }
    </script>
@endsection

@extends('layouts.master')
@section('css')
    <link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex"><h4 class="content-title mb-0 my-auto">My Students</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span></div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    @foreach ($my_students->my_students as $index => $child)
        @if ($index % 3 == 0)
            <!-- Start a new row -->
            <div class="row">
                @endif
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ asset('images/'.$child->image) }}"
                                 onerror="this.onerror=null;this.src='{{ asset('images/kids3.png') }}';">
                            <br>
                            <hr class="line">
                            <h4 class="card-title mb-3">Name: {{ $child->name }}</h4>
                            <h4 class="card-title mb-3">Age: {{ $child->age }}</h4>
                            <table class="mx-auto">
                                <tr>
                                    <th colspan="2"><a class="btn btn-primary w-100"
                                                       href="{{route('Tutor.student_progress',$child->id)}}">Check
                                            Progress</a></th>
                                </tr>
                                <tr>
                                    <td><a style="width: 75px" class="btn btn-dark ripple" href="#sendmedia"
                                           title="Send media file" data-placement="bottom"
                                           data-toggle="modal"> <i class="fa fa-file-text"></i></a></td>
                                    <td><a style="width: 75px" class="btn btn-danger ripple" href="#"
                                           title="Report to parent" data-placement="bottom" data-toggle="tooltip"><i
                                                class="fa fa-question-circle"></i></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($index % 3 == 2 || $loop->last)
                    <!-- Close the row -->
            </div>
        @endif
        <div id="sendmedia" class="modal fade">
            <div class="modal-dialog custom-modal-dialog">
                <div class="modal-content">
                    <form action="{{route('Tutor.sendMedia',$child->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="modal-header">
                            <h4 class="modal-title">Edit child info</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body text-start">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>:Title</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Name"
                                           name="title" placeholder="Title of the media" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">:Pic a file from your storage </label>
                                    <input type="file" class="form-control" id="childpic" name="file">
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
        </div>
        </div>
        <!-- main-content closed -->
        @endsection
        @section('js')
            <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
            <!-- Internal Select2 js-->
            <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/rating/ratings.js')}}"></script>
            <!--Internal  Sweet-Alert js-->
            <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
            <!-- Sweet-alert js  -->
            <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
            <script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
            <script>
                function refreshPage() {
                    // Reload the current page
                    window.location.reload();
                }
            </script>
        @endsection

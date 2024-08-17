@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">User Management</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Media requests</span>
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
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Media Table</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">.All pending media requests</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-8p"><span>User</span></th>
                                <th class="wd-lg-20p"><span></span></th>
                                <th class="wd-lg-20p"><span>To</span></th>
                                <th class="wd-lg-20p"><span>Title</span></th>
                                <th class="wd-lg-20p"><span>Sent in</span></th>
                                <th class="wd-lg-20p">Review</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($medias as $media)
                                <tr>
                                    <td>
                                        <img alt="avatar" class="rounded-circle avatar-md mr-2"
                                             src="{{asset($media->mediaSender->image)}}"
                                             onerror="this.onerror=null;this.src='{{ asset('images/tutor.png') }}';">
                                    </td>
                                    <td>{{$media->mediaSender->name}}</td>
                                    <td>
                                        <a href="#whoschild"
                                           style="text-decoration: none"
                                           data-toggle="modal">{{$media->mediaReceiver->name}}</a>
                                    </td>
                                    <td>
                                        {{$media->title}}
                                    </td>
                                    <td>
                                        {{$media->created_at->format('Y-m-d')}}
                                    </td>
                                    <td>
                                        <a href="#details" data-toggle="modal" class="btn btn-sm btn-primary">
                                            <i class="las la-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div id="whoschild" class="modal fade">
                                    <div class="modal-dialog custom-modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Child info</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>:Parent name</label>
                                                        <input type="text" class="form-control" id="inputName"
                                                               value="{{$media->mediaReceiver->my_parent->name}}"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>:Parent Id</label>
                                                        <input type="text" class="form-control" id="inputName"
                                                               value="{{$media->mediaReceiver->my_parent->id}}"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>:Parent E-mail</label>
                                                        <input type="text" class="form-control" id="inputName"
                                                               value="{{$media->mediaReceiver->my_parent->email}}"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>:Child age</label>
                                                        <input type="text" class="form-control" id="inputName"
                                                               value="{{$media->mediaReceiver->age}}"
                                                               disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="details" class="modal fade">
                                    <div class="modal-dialog custom-modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Child info</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>:Tutor name</label>
                                                        <input type="text" class="form-control" id="inputName"
                                                               value="{{$media->mediaSender->name}}"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>:Tutor Id</label>
                                                        <input type="text" class="form-control" id="inputName"
                                                               value="{{$media->mediaSender->id}}"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>:Parent E-mail</label>
                                                        <input type="text" class="form-control" id="inputName"
                                                               value="{{$media->mediaSender->email}}"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>:Title</label>
                                                        <input type="text" class="form-control" id="inputName"
                                                               value="{{$media->title}}"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>:File</label>
                                                        <input type="submit" class="form-control" id="inputName"
                                                               onclick="openFile()" value="Open the file">
                                                        <script>
                                                            function openFile() {
                                                                let filePath = '{{$media->file}}';
                                                                window.open(filePath, '_blank');
                                                            }
                                                        </script>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <a href="{{route('Admin.AccOrRej',[$media->id,'accepted'])}}">
                                                            <input type="submit" class="btn btn-success" value="Accept">
                                                        </a>
                                                        <a href="{{route('Admin.AccOrRej',[$media->id,'rejected'])}}">
                                                            <input type="submit" class="btn btn-danger" value="Reject">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination mt-4 mb-0 float-left">
                        @if ($medias->previousPageUrl())
                            <li class="page-item page-prev">
                                <a class="page-link" href="{{ $services->previousPageUrl() }}">Prev</a>
                            </li>
                        @endif
                        @if ($medias->nextPageUrl())
                            <li class="page-item page-next">
                                <a class="page-link" href="{{ $services->nextPageUrl() }}">Next</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- row closed  -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection

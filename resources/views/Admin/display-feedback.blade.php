@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Feedbacks</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Users</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @switch($type)
        @case('feedback')
            <div class="row row-sm">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Services Table</h4>
                            </div>
                            <p class="tx-12 tx-gray-500 mb-2">All feedbacks</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive border-top userlist-table">
                                <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th class="wd-lg-8p"><span>User</span></th>
                                            <th class="wd-lg-20p"><span></span></th>
                                            <th class="wd-lg-8p"><span>Date</span></th>
                                            <th class="wd-lg-20p"><span></span></th>
                                            <th class="wd-lg-20p"><span></span></th>
                                            <th class="wd-lg-20p">Details</th>
                                            <th class="wd-lg-20p"><span></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>
                                                    <img alt="avatar" class="rounded-circle avatar-md mr-2"
                                                        src="{{ asset($service->service[0]->user_type($service->service[0]->id, $service->service[0]->type)->image) }}">
                                                </td>
                                                <td>{{ $service->service[0]->name }}</td>
                                                <td class="text-center">
                                                    {{ $service->created_at->format('Y-m-d') }}
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="#servicedetail" class="btn btn-sm btn-primary" data-toggle="modal">
                                                        <i class="las la-search"></i>
                                                    </a>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <div id="servicedetail" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Feedback details</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="code">User name:</label>
                                                                        <input class="form-control" value="{{ $service->service[0]->name }}" disabled>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="name">User Id:</label>
                                                                        <input class="form-control" value="{{ $service->service[0]->id }}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="price">Date:</label>
                                                                        <input class="form-control" value="{{ $service->created_at->format('Y-m-d') }}" disabled>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="expiry_date">Content: </label>
                                                                        <input class="form-control" value="{{ $service->content }}" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-success">
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- COL END -->
            </div>
        @break
        @case('report')
        <div class="row row-sm">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Services Table</h4>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">All reported messages</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top userlist-table">
                            <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-lg-8p"><span>User</span></th>
                                        <th class="wd-lg-20p"><span></span></th>
                                        <th class="wd-lg-8p"><span>Date</span></th>
                                        <th class="wd-lg-20p"><span></span></th>
                                        <th class="wd-lg-20p"><span></span></th>
                                        <th class="wd-lg-20p">Details</th>
                                        <th class="wd-lg-20p"><span></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($services as $service)
                                    @isset($service->sender)
                                    <tr>
                                        <td>
                                            <img alt="avatar" class="rounded-circle avatar-md mr-2"
                                                src="{{ asset($service->sender->user_type($service->sender->id,$service->sender->type)->image) }}">
                                        </td>
                                        <td>{{ $service->sender->name }}</td>
                                        <td class="text-center">
                                            {{ $service->created_at->format('Y-m-d') }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="#servicedetail" class="btn btn-sm btn-primary" data-toggle="modal">
                                                <i class="las la-search"></i>
                                            </a>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <div id="servicedetail" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Message details</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="code">Sender name:</label>
                                                                <input class="form-control" value="{{ $service->sender->user_type($service->sender->id,$service->sender->type)->name }}" disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="name">Sender Id:</label>
                                                                <input class="form-control" value="{{ $service->senderId }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="price">Reciever name:</label>
                                                                <input class="form-control" value="{{ $service->reciever->user_type($service->reciever->id,$service->reciever->type)->name }}" disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="expiry_date">Reciever Id: </label>
                                                                <input class="form-control" value="{{ $service->receiverId}}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="price">Date:</label>
                                                                <input class="form-control" value="{{ $service->created_at->format('Y-m-d') }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="price">Content:</label>
                                                                <input class="form-control" value="{{ $service->content }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('Admin.userBan',$service->senderId) }}"><input type="submit" class="btn btn-danger" value="Ban user"></a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                       <a href="{{ route('UnreportMessage',$service->id) }}"><input type="submit" class="btn btn-success" value="Delete report"></a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endisset
                                @endforeach
                                   
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div><!-- COL END -->
        </div>
        @break
        @default
    @endswitch
    <ul class="pagination mt-4 mb-0 float-left">
        @if ($services->previousPageUrl())
            <li class="page-item page-prev">
                <a class="page-link" href="{{ $services->previousPageUrl() }}">Prev</a>
            </li>
        @endif
        @if ($services->nextPageUrl())
            <li class="page-item page-next">
                <a class="page-link" href="{{ $services->nextPageUrl() }}">Next</a>
            </li>
        @endif
    </ul>
    </div>
    <!-- row closed  -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endsection

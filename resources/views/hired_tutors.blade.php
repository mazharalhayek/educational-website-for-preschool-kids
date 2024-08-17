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
                <h4 class="content-title mb-0 my-auto">Child Tutors</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$thisuserchild->name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


    @foreach ($thisuserchild->my_tutors as $tutor)
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body h-100">
                        <div class="row row-sm ">
                            <div class=" col-xl-5 col-lg-12 col-md-12">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1">
                                        <img src="{{asset($tutor->image)}}" style="width:300px"
                                             onerror="this.onerror=null;this.src='{{asset('images/tutor.png')}}';"/>
                                    </div>
                                </div>
                            </div>
                            <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                <h4 class="product-title mb-1">{{$tutor->name}}</h4>
                                <p class="text-muted tx-13 mb-1">{{$tutor->subject}}</p>
                                <div class="rating mb-1">
                                    <div class="stars">
                                        @for($i=0;$i<5;$i++)
                                            @if($i < $thisuserchild->my_tutors->where('id',$tutor->id)->first()
                                                ->reviews->where('tutor_id',$tutor->id)->first()->review)
                                                <span class="fa fa-star checked"></span>
                                            @else
                                                <span class="fa fa-star text-muted"></span>
                                            @endif
                                        @endfor

                                    </div>
                                    <span
                                        class="review-no">{{$thisuserchild->my_tutors->where('id',$tutor->id)->first()
                                                ->reviews->where('tutor_id',$tutor->id)->first()->review}} :Your review </span>
                                </div>
                                <h6 class="price">current price (Monthly): <span
                                        class="h3 ml-2">${{$tutor->salary}}</span></h6>
                                <h5>:Qualifications</h5><br>
                                <h8 class="product-description" style="color:black">{{$tutor->qualifications}}</h8>
                                <p class="vote"><strong>({{$reviews->where('tutor_id',$tutor->id)->first()['votes']}}
                                        votes)
                                        {{$reviews->where('tutor_id',$tutor->id)->first()['percentage']}}%</strong>
                                    of
                                    children enjoyed
                                    learning by this
                                    tutor</p>
                                <div>
                                    <form action="{{route('Parent.unhire_a_tutor',$thisuserchild->id)}}">
                                        @csrf
                                        <button class="add-to-cart btn btn-danger position-absolute top-0 start-0"
                                                name="tutor_id" value="{{$tutor->id}}">Remove
                                        </button>
                                    </form>
                                    @if(!$thisuserchild->my_tutors->where('id',$tutor->id)->first()
                                                ->reviews->where('tutor_id',$tutor->id)->first()->review)
                                        <a href="#review" data-toggle="modal">
                                            <button type="submit" class="btn btn-warning">Give a review</button>
                                        </a>
                                        <div id="review" class="modal fade">
                                            <div class="modal-dialog custom-modal-dialog">
                                                <div class="modal-content">
                                                    <form
                                                        action="{{route('Parent.TutorReview',[$tutor->id,$thisuserchild->id])}}"
                                                        method="post"
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
                                                                    <label for="image">The review must be betwee 1 ->
                                                                        5</label>
                                                                    <input type="number" class="form-control"
                                                                           placeholder="enter a number" name="review">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-default"
                                                                   data-dismiss="modal"
                                                                   value="Cancel">
                                                            <input type="submit" class="btn btn-success" value="Send">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- /row -->
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>

    <!-- main-content closed -->
@endsection
@section('js')

    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection

@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .card {
       width: 7cm;
       height:8cm;
    }

    .card-img-top {
       width: 3cm;
       height:3cm;
    }
    .line{
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
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">My children</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span></div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2" onclick="refreshPage()"><i class="mdi mdi-refresh"></i></button>
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
                        <div class="card text-center" >
                            <div class="card-body">
                                <img class="card-img-top" src="{{asset('images/'.$child->image)}}" onerror="this.onerror=null;this.src='{{asset('images/kids3.png')}}';">

                                <br>
                                <hr class="line">
                                <h4 class="card-title mb-3">Name: {{$child->name}}</h4>
                                <h4 class="card-title mb-3">Age: {{$child->age}}</h4>
                                <table style="margin-right:15px">
                                    <th><a class="btn btn-dark" href="{{route('Parent.editchild',$child->id)}}" title="Edit Account" data-placement="bottom" data-toggle="tooltip" ><i class="fas fa-pencil-alt"></i></a></th>
                                    <th><a class="btn btn-primary" href="{{route('Parent.child_interface',$child->id)}}">Log in </a></th>
                                    <th><a class="btn btn-dark ripple" href="{{route('Parent.child_remove',$child->id)}}" title="Remove Account"  id="swal-warning" data-placement="bottom" data-toggle="tooltip" ><i class="fas fa-trash-alt"></i></a></th>
                                </table>
                            </div>
                        </div>
                     </div>
                    @endforeach
                </div>
             @endforeach
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
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

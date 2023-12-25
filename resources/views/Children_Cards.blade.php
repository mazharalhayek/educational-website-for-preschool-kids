@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .card {
       width: 7cm; /* adjust as needed */
       height:8cm; /* adjust as needed */
    }

    .card-img-top {
       width: 3cm;
       height:3cm;
    }
    .line{
        border: none;
        height: 2px; /* Adjust this value to change the thickness */
        background-color: #333;
    }
    </style>
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">Apps</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ My children</span></div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2" onclick="refreshPage()"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
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
				<!-- row opened -->

                @foreach ($childs->chunk(3) as $chunk)
                <div class="row">
                    @foreach ($chunk as $child)
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card text-center" >
                            <div class="card-body">
                                <img class="card-img-top" src="{{asset('images/'.$child->image)}}" alt="">
                                <br>
                                <hr class="line">
                                <h4 class="card-title mb-3">Name: {{$child->name}}</h4>
                                <h4 class="card-title mb-3">Age: {{$child->age}}</h4>
                                <table style="margin-right:15px">
                                    <th><a class="btn btn-dark" href="{{route('Parent.editchild',$child->id)}}" title="Edit Account"><i class="fas fa-pencil-alt"></i></a></th>
                                    <th><a class="btn btn-primary" href="{{route('Parent.child_interface',$child->id)}}">Log in </a></th>
                                    <th><a class="btn btn-dark ripple"  title="Remove Account"  id='swal-warning'><i class="fas fa-trash-alt"></i></a></th>
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

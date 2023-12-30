@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Feedbacks</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Users</span>
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
				<!--Row-->
				<div class = "container-fluid">
				<div class="row">
					@foreach($feedback as $item)
					<div class="card">
						<div class="card-header" style="font-size: 1.2rem; font-weight: 500; ">
					
							@foreach($item->service as $service)
						  Feedback Posted by {{$service->name}}
						
						  <div style="float: left; display:flex; gap: 4px;">
								<form method="POST" action = "{{route('Admin.destroyFeedback', $item->id)}}">
									@csrf
									@method("DELETE")
									
								<button class="btn btn-danger">Delete</button>
								</form>
						  </div>
						  @endforeach
						</div>
						<div class="card-body">
						  <blockquote class="blockquote mb-0">
							<p>{{$item->content}}</p>
							<footer class="blockquote-footer">Posted at: {{$item->created_at->format('Y-m-d')}}</footer>
						  </blockquote>
						</div>
					  </div>
					  @endforeach
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
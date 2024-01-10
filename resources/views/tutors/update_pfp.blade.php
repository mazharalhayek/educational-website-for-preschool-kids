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
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">Edit Profile</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Profile pic</span></div>
					</div>
                </div>
				<!-- breadcrumb -->
@endsection
@section('content')
<form action="{{route('Tutor.removepfp')}}" method="post">
    @csrf
    @method('PUT')
    <input type="submit" class="btn btn-danger float-left" name="image" value="remove">
</form>
<div style="display: flex; flex-direction: column; align-items: center; height: 100vh;">
    <img src="{{asset('images/'.$image->image)}}" alt="no profile pic" style="max-width: 100%;" onerror="this.onerror=null;this.src='{{ asset('images/teacher1.png') }}';">
    <form action="{{route('Tutor.updatepfp')}}" style="margin-top: 20px;" method="post">
        @csrf
        @method('PUT')
        <input type="file" class="btn btn-dark" name="image">
        <input type="submit" class="btn btn-dark">
    </form>
 </div>
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

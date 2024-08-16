@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Content Management</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add Book</span>
						</div>
					</div>
                </div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
				<div class = "container-fluid">
					<form action="{{ route('Admin.postBook') }}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="mb-3">
							<label for="title" class="form-label">Title</label>
							<input type="text" class="form-control" id="title" name="title" required>
						</div>

						<div class="mb-3">
							<label for="author" class="form-label">Author</label>
							<input type="text" class="form-control" id="author" name="author" required>
						</div>

						<div class="mb-3">
							<label for="description" class="form-label">Description</label>
							<textarea class="form-control" id="description" name="description" rows="3" required></textarea>
						</div>

						<div class="mb-3">
							<label for="price" class="form-label">Price</label>
							<input type="number" class="form-control" id="price" name="price" required>
						</div>

                        <div class="mb-3">
							<label for="rating" class="form-label">Rating</label>
							<input type="number" class="form-control" id="rating" name="rating" required>
						</div>

						<div class="mb-3">
							<label for="Cover" class="form-label">Cover Image</label>
							<input type="file" class="form-control" id="Cover" name="Cover" accept="image/*" required>
						</div>

						<div class="mb-3">
							<label for="PDF" class="form-label">PDF File</label>
							<input type="file" class="form-control" id="PDF" name="PDF" accept=".pdf" required>
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
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

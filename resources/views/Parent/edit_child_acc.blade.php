@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link
href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
rel="stylesheet"
/>
<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
rel="stylesheet"
/>
<meta
name="viewport"
content="width=device-width,initial-scale=1,maximum-scale=1"
/>
<style>
form {
  font-family: "Inter", sans-serif;
}
</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">Apps</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ New child account</span></div>
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
				<!-- row opened -->

<form method="POST" action="{{route('Parent.updatechild',$editchild->id)}}" >
                        @csrf
                        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                            <div class="card  box-shadow-0">
                                <div class="card-header">
                                    <h4 class="card-title mb-1">Edit Child account</h4>
                                    <p class="mb-2">Edit your child info here</p>
                                </div>
                                <div class="card-body pt-0">
                                    <form class="form-horizontal" >
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$editchild->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number"  min="0" max="8" class="form-control" id="inputEmail3" placeholder="Age" name="age" value="{{$editchild->age}}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" value="{{$editchild->password}}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" name="password_confirmation" value="{{$editchild->password}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Select a pic of your child (optional)</label>
                                            <input type="file" class="form-control" id="childpic" placeholder="select a pic" value="{{$editchild->image}}" name="image">
                                        </div>
                                        <div class="form-group mb-0 mt-3 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
     
    </div>
    <div class="REMOVE-THIS-ELEMENT-IF-YOU-ARE-USING-THIS-PAGE hidden treact-popup fixed inset-0 flex items-center justify-center" style="background-color: rgba(0,0,0,0.3);">
        <div class="max-w-lg p-8 sm:pb-4 bg-white rounded shadow-lg text-center sm:text-left">

          <h3 class="text-xl sm:text-2xl font-semibold mb-6 flex flex-col sm:flex-row items-center">
            <div class="bg-green-200 p-2 rounded-full flex items-center mb-4 sm:mb-0 sm:mr-2">
              <svg class="text-green-800 inline-block w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
              </div>
          </h3>
        </div>
      </div>
                      
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>

		<!-- main-content closed -->
@endsection
@section('js')
<script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"
      defer
    ></script>
@endsection

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('layouts.head')
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/dashboard_styles.css') }}">
        <script src="{{ asset('js/scriptes.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</head>

	<body class="main-body app sidebar-mini">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@include('layouts.main-sidebar')
		<!-- main-content -->
		<div class="main-content app-content">
			@include('layouts.main-header')
			<!-- container -->
            <div class="messages" align="left" >
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger errors alert-dismissible fade show" role="alert">
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                        </div>
                    @endforeach
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" id="success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
			<div class="container-fluid">
				@yield('page-header')
				@yield('content')
				@include('layouts.models')
            	@include('layouts.footer')
				@include('layouts.footer-scripts')
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            $(".messages .alert").fadeOut("slow");
                        }, 3000);
                    });
                </script>
            </body>
            </div>
        </div>
	</body>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".messages .alert").fadeOut("slow");
            }, 3000);
        });
    </script>
</html>

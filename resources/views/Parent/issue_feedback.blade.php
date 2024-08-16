@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Main</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Issue Feedback</span>
            </div>
        </div>        
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- center container -->
    <div class = "container-fluid">
      <form action = "{{route('Parent.sendFeedback', ['type' => 'feedback'])}}" method="POST">
        @csrf
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Your Feedback</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="content"></textarea>
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
    </div>
</div>

    
   
@endsection
@section('js')
@endsection

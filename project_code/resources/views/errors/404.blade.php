@extends('layouts.main')

@section('pageTitle', 'create-todos')

@section('content')

    <div class="container">
      
        <div class="row text-center">
            <div class="col-12">
                <img src="{{asset('assets/image/page-error.avif')}}" class="img-fluid" alt="page-not-found">
            </div>
            <div class="text-center">
                <a href="{{url('/')}}" class="btn btn-outline-danger">Go to Home Page</a>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('css')
    <style>
      body{
        background:none
      }
    </style>
@endpush

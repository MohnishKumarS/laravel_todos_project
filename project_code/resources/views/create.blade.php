@extends('layouts.main')

@section('pageTitle', 'create-todos')

@section('content')

    <div class="container">
        <a href="{{url('/')}}">
          <h1 class="title-sec center">to<span class="title-sec-highlight">do</span>s.</h1>
        </a>

        <div class="row">
            <div class="col-lg-7 col-xl-6  mx-auto ">
                <div class="card p-3 shadow">
                    <div class="card-body">
                        <form action="{{ route('todos.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title" class="form-label fw-bold ">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"
                                    placeholder="enter Title">
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="description" class="form-label fw-bold ">Description</label>
                                <textarea class="form-control" id="description" rows="3" name="description" placeholder="enter Description">{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <div class="text-danger">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="text-end ">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

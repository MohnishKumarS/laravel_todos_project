@extends('layouts.main')

@section('pageTitle', 'edit-todos')

@section('content')

    <div class="container">
      <a href="{{url('/')}}">
        <h1 class="title-sec center">to<span class="title-sec-highlight">do</span>s.</h1>
      </a>

        <div class="row">
            <div class="col-lg-8 col-xl-7 mx-auto">
                <div class="card p-3 shadow">
                    <div class="card-body">
                        <form action="{{ url('todos/' . $todoData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="title" class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="enter Title" value="{{ $todoData->title }}">
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" id="description" rows="3" name="description" placeholder="enter Description">{{ $todoData->description }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="text-danger">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" name="completed" value="1"
                                        {{ $todoData->completed ? 'checked' : '' }}>
                                </div>
                                <input type="text" class="form-control"
                                    value="If the task is completed, please check the box/tick the box" disabled>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

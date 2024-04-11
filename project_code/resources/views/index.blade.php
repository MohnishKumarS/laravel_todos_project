@extends('layouts.main')

@section('pageTitle', 'Todos task')

@section('content')

    <div class="container">
        <h1 class="title-sec">to<span class="title-sec-highlight">do</span>s.</h1>
        <div class="text-end mb-4">
            <a href="{{ url('todos/create') }}" class="btn btn-outline-light fw-bold">Add new task <i class='bx bx-notepad'></i></a>
        </div>

        <div class="todo-wrapper ">
            <div class="table-responsive">
                <table class="table table-bordered text-center shadow">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="40%">Name</th>
                            <th scope="col" width="15%">completed</th>
                            <th scope="col" width="15%">created at</th>
                            <th scope="col" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            use Carbon\Carbon;
                            $i = 1;
                        @endphp
                        @forelse ($todoList as $item)
                            @php
                                // --- get a datetime to display human readable time 
                                $created_time = Carbon::parse($item->created_at)->diffForHumans();
                            @endphp
                            <tr class="align-middle">
                                <th scope="row">{{ $i++ }}</th>
                                <td>
                                    <h5>{{ $item->title }}</h5>
                                    <p><small>{{ $item->description }}</small></p>
                                </td>
                                <td>

                                    <div class="fs-3">
                                        @if ($item->completed)
                                            <div class="text-success">
                                              <i class='bx bx-task'></i>
                                            </div>
                                        @else
                                            <div class="text-danger">
                                                <i class='bx bx-task-x'></i>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <small>{{ $created_time }}</small>
                                </td>
                                <td>
                                    <div>
                                      {{-- EDIT BTN --}}
                                        <a href="{{ route('todos.edit', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary"> <i class='bx bxs-edit' title="edit"></i></a>
                                          {{-- DELETE BTN --}}
                                        <button type="button" class="btn btn-outline-danger js-todo-deletebtn ms-lg-2"
                                            title="delete" value="{{ $item->id }}"> <i
                                                class='bx bxs-trash'></i></button>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="5">
                                    <div class="text-center my-5 ">
                                        <img src="{{ asset('assets/image/no-data.avif') }}" alt="no records found"
                                            class="img-fluid" width="500px">
                                    </div>
                                </th>
                            </tr>
                        @endforelse


                    </tbody>
                </table>

                <div class="paginate-pro my-5 text-center">
                    {{ $todoList->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        // to click delete btn to send a ajax req to the server
        $(document).ready(function() {
            $(document).on('click', '.js-todo-deletebtn', function() {
                let $id = $(this).attr('value');
                console.log($id);

                // CONFIRM to delete
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX request
                        $.ajax({
                            url: "{{ url('todos/') }}" + '/' + $id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                todoId: $id
                            },
                            success: function(data) {
                                console.log(data);

                                $('.todo-wrapper').load(location.href +
                                    ' .todo-wrapper')

                            }
                        })
                    }
                });


            })
        })
    </script>
@endpush

@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Users</h2>
            <div class="col-12 mt-5">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Comment</th>
                            <th scope="col">News</th>
                            <th scope="col">Options</th>
                            <th scope="col">Send Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                            <tr>
                                <th scope="row">{{ $model->id }}</th>
                                <td>{{ $model->name }}</td>
                                <td>{{ $model->email }}</td>
                                <td>
                                    <a href="{{ route('viewcomments', $model->id) }}" class="btn btn-info">
                                        {{ $model->comments->count() }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('viewnews', $model->id) }}" class="btn btn-info">
                                        {{ $model->news->count() }}
                                    </a>
                                </td>
                                <td>
                                    <!-- Edit news -->
                                    <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal"
                                        data-bs-target="#exampleModala{{ $model->id }}">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModala{{ $model->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('edituser', $model->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Name</label>
                                                            <input type="text" name="name"
                                                                value="{{ $model->name }}" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1"
                                                                class="form-label">Email</label>
                                                            <input type="email" name="description"
                                                                value="{{ $model->email }}" class="form-control"
                                                                id="exampleInputPassword1">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1" class="form-label">New
                                                                password</label>
                                                            <input type="password" name="password" class="form-control"
                                                                id="exampleInputPassword1">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Save">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Edit News --}}

                                    <!-- Delete news -->
                                    <button type="button" class="btn btn-danger mb-5" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalp{{ $model->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalp{{ $model->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('deleteuser', $model->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <h3>Delete : {{ $model->name }} ? </h3>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Delete News --}}
                                </td>
                                <td>
                                    <a href="{{ route('sendemail', $model->id) }}">Email</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $models->links() }}
            </div>
        </div>
    </div>
@endsection

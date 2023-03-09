@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 mt-5">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add News
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('addnews') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                    <input type="text" name="description" class="form-control"
                                        id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Text</label>
                                    <textarea name="text" id="" cols="10" rows="5" class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Descripti</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Ccmment</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <th scope="row">{{ $model->id }}</th>
                            <td>{{ $model->title }}</td>
                            <td>{{ $model->description }}</td>
                            <td>{{ $model->likes }}</td>
                            <td>{{ $model->title }}</td>
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
                                            <form action="{{ route('editnews', $model->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Title</label>
                                                        <input type="text" name="title" value="{{ $model->title }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Description</label>
                                                        <input type="text" name="description"
                                                            value="{{ $model->description }}" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Text</label>
                                                        <textarea name="text" id="" cols="10" rows="5" class="form-control">{{ $model->title }}</textarea>
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
                                            <form action="{{ route('deletenews', $model->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <h3>Delete : {{ $model->title }} ? </h3>

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
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

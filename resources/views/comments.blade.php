@extends('layouts.sayt')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <h6 class="border-bottom pb-2 mb-0">{{ $news->title }}</h6>
                    <div class="d-flex text-muted pt-3">
                        <p class="pb-3 mb-0 small lh-sm border-bottom">
                            <strong class="d-block text-gray-dark">Author : {{ $news->user->name }}</strong>
                            {{ $news->text }}
                        </p>
                    </div>
                </div>
                @foreach ($models as $model)
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="d-flex text-muted pt-3">
                            <p class="pb-3 mb-0 small lh-sm border-bottom">
                                <strong class="d-block text-gray-dark">{{ $model->user->name }}</strong>
                                {{ $model->text }}
                            </p>
                        </div>
                    </div>
                @endforeach
                <form class="d-flex" method="POST" action="{{ route('addcomment', $news->id) }}">
                    @csrf
                    <input class="form-control me-2" name="text">
                    <input class="btn btn-outline-success" type="submit" value="Send">
                </form>
            </div>
        </div>
    </div>
@endsection

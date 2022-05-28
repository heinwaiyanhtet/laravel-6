@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @component("component.breadcrumb")
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add article</li>
                @endcomponent
                <div class="card">
                    <div class="card-header">Add Article</div>
                    <div class="card-body">
                        @if(session('status'))
                            <p class="alert alert-danger">
                                {!! session('status') !!}
                            </p>
                        @endif
                        <form action="{{route("article.store")}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Article Title</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" name="title" value="{{old('title')}}">
                                @error("title")
                                    <small class="font-weight-bolder text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <label for="photo">Upload Photo</label>
                                        <input type="file" name="photo[]" id="photo" class="form-control p-1" multiple>
                                        @error("photo.*")
                                            <small class="font-weight-bolder text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="10" name="description">{{old('description')}}</textarea>
                                @error("description")
                                <small class="font-weight-bolder text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button class="btn btn-primary">Save Article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

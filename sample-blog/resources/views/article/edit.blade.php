@extends('layouts.app')
@section("head")
    <style>
        .article-thumbnail{
            margin-top:10px;
            width:150px;
            height:150px;
            display: inline-block;
            border-radius: 0.25rem;
            background-size:150px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @component("component.breadcrumb")
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update article</li>
                @endcomponent
                <div class="card">
                    <div class="card-header">Add Article</div>
                    <div class="card-body">
                        @if(session('status'))
                            <p class="alert alert-danger">
                                {!! session('status') !!}
                            </p>
                        @endif


                        <form action="{{route("article.update",$article->id)}}" id="article-form" method="post">
                            @csrf
                            @method("put")
                            <div class="form-group">
                                <label for="title">Article Title</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" name="title" value="{{$article->title}}">
                                @error("title")
                                <small class="font-weight-bolder text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="10" name="description">{{$article->description}}</textarea>
                                @error("description")
                                <small class="font-weight-bolder text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button class="btn btn-primary" form="article-form">Update Article</button>
                            <hr>
                        </form>

                            @foreach($article->getPhotos as $img)
                                <div class="d-inline-block">
                                    <div class="article-thumbnail shadow-sm" style="background-image: url('{{asset("storage/article/".$img->location)}}')"></div>
                                    <form action="{{route('photo.destroy',$img->id)}}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-danger btn-sm" style="margin-top:-80px;margin-left:5px">delete</button>
                                    </form>
                                </div>
                            @endforeach
                            <form action="{{route("photo.store")}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <div class="form-row">
                                    <div class="col-6">
                                        <input type="file" name="photo[]" id="photo" class="form-control p-1" multiple required>
                                        @error("photo.*")
                                        <small class="font-weight-bolder text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary">upload new photo</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

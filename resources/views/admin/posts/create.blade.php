@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="my-5" action="{{route('admin.posts.store')}}" method="POST">
            @csrf 
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}"/>
                @error('name')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{old('content')}}</textarea>
                @error('content')
                    <div class='invalid-feedback alert alert-danger  p-1'>
                        {{$message}}
                    </div>
                @enderror   
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}"/>
                @error('slug')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Inserisci Post</button>
            <a class="btn btn-primary d-inline-block" href="{{route('admin.posts.index')}}">Annulla</a>
        </form>
    </div>
@endsection
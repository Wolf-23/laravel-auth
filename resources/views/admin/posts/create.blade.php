@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="my-5" action="{{route('admin.posts.store')}}" method="POST">
            @csrf 
            {{-- TITLE --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}"/>
                @error('title')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- MEDIA --}}
            <div class="mb-3">
                <label for="media" class="form-label">Media</label>
                <input type="text" class="form-control @error('media') is-invalid @enderror" id="media" name="media" value="{{old('media')}}"/>
                @error('media')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- AUTHOR --}}
            <div class="mb-3">
                <label for="author" class="form-label">Choose an Author</label>
                <select name="author" id="author" class="form-select @error('author') is-invalid @enderror ">
                    <option {{(old('author')=='Simone Giusti')?'selected':''}} value="Simone Giusti">Simone Giusti</option>
                    <option {{(old('author')=='Alessio Vietri')?'selected':''}} value="Alessio Vietri">Alessio Vietri</option>
                    <option {{(old('author')=='Jacopo Damiani')?'selected':''}} value="Jacopo Damiani">Jacopo Damiani</option>
                </select>
                @error('author')
                    <div class='invalid-feedback'>
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- CONTENT --}}
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{old('content')}}</textarea>
                @error('content')
                    <div class='invalid-feedback alert alert-danger  p-1'>
                        {{$message}}
                    </div>
                @enderror   
            </div>
            {{-- SLUG --}}
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
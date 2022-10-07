@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-3">Crea Nuovo Post</a>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Gestisci</th>
              </tr>
            </thead>
            <tbody class="table-light text-dark">
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <a href="#" class="btn btn-success">Vedi</a>
                        <a href="#" class="btn btn-warning">Modifica</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
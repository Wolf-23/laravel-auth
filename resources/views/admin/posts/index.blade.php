@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-3">Crea Nuovo Post</a>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Gestisci</th>
              </tr>
            </thead>
            <tbody class="table-light text-dark">
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>bottoni</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
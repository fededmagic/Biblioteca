@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')

<div class = "card">

    <div class = "card-header">

        <h5>Libri del circolo</h5>

    </div>

    <div class = "card-body">

        <table class = "table table-bordered table-striped">

            <tr>
                <th>Foto</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Categoria</th>
                <th>Dettagli</th>
            </tr>

            @foreach($viewData["books"] as $book) 
                <tr>
                    <td>
                        <img src = "{{asset("/storage/" .  $book->getPicture())}}" width = 100px class = "img-fluid rounded-start">
                    </td>
                    <td>{{ $book->getName() }}</td>
                    <td>{{ $book->getAuthor() }}</td>
                    <td>{{ $book->getTopic() }}</td>
                    <td><a class = "btn bg-primary text-white" href = "{{route('home.show', ['id' => $book->getId()])}}"><i class="bi bi-book"></i></a></td>
                </tr>
            @endforeach

        </table>

    </div>


</div>

<a class = "btn bg-primary text-white" href = "{{route('admin.index')}}">admiiiiin</a>

@endsection
@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')

<div class = "card">

    <div class = "card-header">

        <h5>I miei libri</h5>

    </div>

    <div class = "card-body">

        <table class = "table table-bordered table-striped">

            <tr>
                <th>Foto</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Consegna</th>
            </tr>

            @foreach($viewData["books"] as $book) 
                <tr>
                    <td>
                        <img src = "{{asset("/storage/" . $book->getPicture())}}" width = 100px class = "img-fluid rounded-start">
                    </td>
                    <td>{{ $book->getName() }}</td>
                    <td>{{ $book->getAuthor() }}</td>
                    <td><a class = "btn bg-primary text-white" href = ""><i class="bi bi-capslock"></i></a></td>
                </tr>
            @endforeach

        </table>

    </div>


</div>

@endsection
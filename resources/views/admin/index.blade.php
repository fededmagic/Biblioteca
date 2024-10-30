@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')


<div class = "card">

    <div class = "card-header">

        <h5>Aggiungere libri</h5>

    </div>

    <div class = "card-body">


        @if($errors->any())
        <ul class = "alert alert-danger list-unstyled">

            @foreach($errors->all() as $error)
                <li>- {{ $error }} </li>
            @endforeach

        </ul>
        @endif

        <form method = "POST" action = "{{ route('admin.store') }}" enctype = "multipart/form-data">

            @csrf
            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Titolo:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "text" value = "{{old('name')}}" name = "name" class = "form-control">
                        </div>

                    </div>
                </div>
                <div classs = "col">
                    <div class = "mb-3 row">
                    
                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Autore:</label>

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "number" value = "{{old('author')}}" name = "author" class = "form-control">
                        </div>

                    </div>
                </div>
            </div>
            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">
                    
                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Categoria:</label>

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <select class = "form-select" name = "topic" id = "topic">
                                <option selected value = "Magia generale">Magia generale</option>
                                <option value = "Cartomagia">Cartomagia</option>
                                <option value = "Monetomagia">Monetomagia</option>
                                <option value = "Mentalismo">Mentalismo</option>
                                <option value = "Magia da scena">Magia da scena</option>
                                <option value = "Mentalismo">Mentalismo</option>
                                <option value = "Matemagia">Matemagia</option>
                                <option value = "Altro">Altro</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Immagine:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "file" value = "{{old('picture')}}" name = "picture" class = "form-control">
                        </div>

                    </div>
                </div>
                <div classs = "col">
                    <div class = "mb-3 row">
                    
                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Anno di pubblicatione:</label>

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "number" value = "{{old('year')}}" name = "year" class = "form-control">
                        </div>

                    </div>
                </div>
            </div>
            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <button name = "btnSubmit" class = "btn btn-primary">Salva</button>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    
    </div>

</div>

<br>

<div class = "card">

    <div class = "card-header">

        <h5>Tabella gestione libri</h5>

    </div>

    <div class = "card-body">

        <table class = "table table-bordered table-striped">

            <tr>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Categoria</th>
                <th>Modifica</th>
                <th>Cancella</th>
            </tr>

            @foreach($viewData['books'] as $book) 

                <tr>
                    <td>{{$book->getName()}}</td>
                    <td>{{$book->getAuthor()}}</td>
                    <td>{{$book->getTopic()}}</td>
                    <td>
                        <a href = "{{route("admin.edit", $book->getId())}}">
                            <button class = "bg btn-primary rounded">Modifica</button>
                        </a>
                    </td>
                    <td>
                        <form method = "POST" action = "{{route("admin.delete", $book->getId())}}">
                            <button class = "bg btn-primary rounded">Cancella</button>
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                </tr>
            
            @endforeach

        </table>

    </div>

</div>

@endsection
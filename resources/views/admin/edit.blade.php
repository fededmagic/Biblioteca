@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')


<div class = "card">

    <div class = "card-header">

        <h5>Modificare libri</h5>

    </div>

    <div class = "card-body">


        @if($errors->any())
        <ul class = "alert alert-danger list-unstyled">

            @foreach($errors->all() as $error)
                <li>- {{ $error }} </li>
            @endforeach

        </ul>
        @endif

        <form method = "POST" action = "{{ route('admin.store', $viewData["book"]->getId()) }}" enctype = "multipart/form-data">

            @csrf
            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Titolo:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "text" value = "{{ $viewData["book"]->getName() }}" name = "name" class = "form-control">
                        </div>

                    </div>
                </div>
                <div classs = "col">
                    <div class = "mb-3 row">
                    
                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Autore:</label>

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "text" value = "{{ $viewData["book"]->getAuthor() }}" name = "author" class = "form-control">
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
                                @foreach($viewData["topics"] as $topic)
                                    <option value = "{{ $topic }}" 
                                    @if($topic == $viewData["book"]->getTopic()) selected @endif
                                    >{{ $topic }}</option> @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Immagine:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "file" value = "{{ $viewData["book"]->getPicture() }}" name = "picture" class = "form-control">
                        </div>

                    </div>
                </div>
                <div classs = "col">
                    <div class = "mb-3 row">
                    
                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Anno di pubblicatione:</label>

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "number" value = "{{ $viewData["book"]->getYear() }}" name = "year" class = "form-control">
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


@endsection
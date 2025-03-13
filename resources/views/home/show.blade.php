@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

<div class = "card">

    <div class = "card-header">

        <h5 class = "card-title">
            {{$viewData['book']->getName()}}
        </h5>


    </div>

    <div class = "card-body">

        <div class = "row">

        <div class = "col-md-4">
            <img src = "{{asset("/storage/" .  $viewData['book']->getPicture())}}" class = "img-fluid rounded-start">
        </div>

        <br><br>

        <div class = "col-md-8">

            <p class = "card-text">
                Categoria: {{$viewData['book']->getTopic()}}
            </p>
                
            <p class = "card-text">
                Autore: {{$viewData['book']->getAuthor()}}
            </p>

            <p class = "card-text">
                Anno di uscita: {{$viewData['book']->getYear()}}
            </p>

            <p class = "card-text">

                <form method = "POST" action = "">

                    @csrf
                    <div class = "row">
                        
                        @if($viewData["status"] != 0)
                        <p class="text-danger">Attualmente preso in prestito da {{$viewData["user"]}}</p>
                        @else
                        <div class = "col-auto">
                            <button type = "submit" class = "btn btn-primary">Prendi in prestito</button>
                        </div>
                        @endif

                    </div>

                 </form>
            </p>

        </div>

    </div>

    </div>

</div>

@endsection

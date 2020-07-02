@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto">
        @php
            $user=$book->find($book->id)->relUsers;
        @endphp
        <p> Título: {{$book->titulo}}<br>
        Páginas: {{$book->paginas}}<br>
        Preço: R$ {{$book->preço}}<br>
        Autor: {{$user->name}}<br>
        Email do autor: {{$user->email}}<br>
        </p>
    </div>
@endsection

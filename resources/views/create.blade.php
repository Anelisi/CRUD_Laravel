'@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($book))Editar @else Cadastrar @endif</h1> <hr>

    <div class="col-8 m-auto">
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif
        @if(isset($book))
                <form name="formEdit" id="formEdit" method="post" action="{{url("books/$book->id")}}">
                  @method('PUT')
        @else
                <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
        @endif

            @csrf
            <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Título: " value="{{$book->titulo ?? ''}}" required><br>
            <select class="form-control" name="id_user" id="id_user" required>
                <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Selecione o autor'}}</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
            <input class="form-control" type="text" name="paginas" id="paginas" placeholder="Páginas: " value="{{$book->paginas ?? ''}}" required><br>
            <input class="form-control" type="text" name="preço" id="preço" placeholder="Preço: " value="{{$book->preço ?? ''}}"required><br>
            <input class="btn-primary" type="submit" value="@if(isset($book))Editar @else Cadastrar @endif"><br>
        </form>

    </div>
@endsection
'

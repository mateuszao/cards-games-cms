@extends('layouts.app')

@section('content')
    <style>
        .inicio-home {
            display: flex;
            align-items: center;
        }

        .inicio-home h4 {
            font-size: 30px;
            text-transform: uppercase;
        }

        .inicio-home div:nth-child(2){
            padding-left: 10px;
        }
    </style>
    <div class="mt-5">

        <div class="inicio-home">
            <div>
                <h4>Cadastro informações | home |</h4>
            </div>
            <div>
                <a href="{{route('admin.inicio.create')}}" class="btn btn-lg btn-success"> Criar Inicio </a>
            </div>
        </div>
    </div>



    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($inicio as $i)
            <tr>
                <td>{{ $i->id}}</td>
                <td>{{ $i->titulo}}</td>
                <td>{{ $i->descricao }}</td>

                <td>
                    <div class="btn-group">
                        <a href="{{ route('admin.inicio.edit', ['inicio' => $i->id])}}" class="btn btn-sm btn-primary mr-2"> Editar </a>
                        <form action="{{route('admin.inicio.destroy', ['inicio' => $i->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                        </form>
                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

    {{$inicio->links()}}

@endsection

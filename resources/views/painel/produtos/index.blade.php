@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">Listagem de Produtos</h1>

<a href="{{route('produtos.create')}}" class="btn btn-primary btn-add">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar
</a>

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>Descricao</th>
        <th width="100px">Acoes</th>
    </tr>          
    @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->name }}</td>
            <td>{{ $produto->description }}</td>
            <td>
                <a href="" class="edit actions">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="" class="delete actions">
                <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>            
    @endforeach

</table>

@endsection
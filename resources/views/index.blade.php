@extends('layout')

@section('content')

<style>
    .push-top{
        margin-top: 50px;
    }
</style>
<div class="push-top">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success')}}
    </div><br/>
    @endif
    <table class="table">
       <thead>
         <tr class="table-warning">
             <td>ID</td>
             <td>Nome</td>
             <td>Email</td>
             <td>Telefone</td>
             <td>Password</td>
             <td class="text-center">Ação</td>
         </tr>
       </thead>
       <tbody>
           @foreach($estudante as $estudantes)
           <tr>
             <td>{{$estudantes->id}}</td>
             <td>{{$estudantes->nome}}</td>
             <td>{{$estudantes->email}}</td>
             <td>{{$estudantes->telefone}}</td>
             <td>{{$estudantes->password}}</td>
             <td class="text-center">
                 <a href="{{ route('estudantes.edit', $estudantes->id)}}" class="btn btn-primary btn-sm"">Editar</a>
                 <form action="{{ route('estudantes.destroy', $estudantes->id)}}" method="post" style="display:  inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Deletar</button>
                 </form>
             </td>
           </tr>
           @endforeach
       </tbody>
    </table>
</div>
@endsection

@extends ('layout')

@section('content')

<style>
   .container{
       max-width: 450px;
   }
   .push-top{
       margin-top: 50px;
   }
</style>
<div class="card push-top">
     <div class="card-header"> Editar & Atualizar
     </div>

     <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('estudantes.update', $estudante->id) }}">
             <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" value="{{$estudante->nome}}"/>
             </div>
             <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" value="{{$estudante->email}}"/>
             </div>
             <div class="form-group">
                <label for="telefone">Telefone</label>
                <input class="form-control" name="telefone" value="{{$estudante->telefone}}"/>
             </div>
             <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" value="{{$estudante->password}}"/>
             </div>
             <button type="submit" class="btn btn-block btn-danger">Atualizar Usuário</button>
        </form>
     </div>
</div>
@endsection

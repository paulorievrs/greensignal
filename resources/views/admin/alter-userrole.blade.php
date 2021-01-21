@extends('adminlte::page')
@section('title', 'Alterar Cargo de Usuário')
@section('content')
    <div class="container">
        @if(session('response') !== null)
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-primary" role="alert">
                        {{ session('response') }}
                    </div>
                </div>
            </div>
        @endif

        @if(session('error') !== null)
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        <h1>Alterar cargos de usuários</h1>
    @foreach($users as $user)
        <div class="card">
            <div class="card-body">
                <h1>{{ $user->name }}</h1>
                <form action="/alter-userrole/{{ $user->id }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 form-group pb-2">
                           <select name="role_id">
                               <option value="{{ $user->role_id }}">{{ \App\Models\Role::find($user->role_id)->name }}</option>
                               @foreach($roles as $role)
                                   @if($role->id !== $user->role_id)
                                       <option value="{{ $role->id }}">{{ $role->name }}</option>
                                   @endif
                               @endforeach
                           </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center align-content-center">
            {{ $users->links() }}
        </div>
    </div>
@stop

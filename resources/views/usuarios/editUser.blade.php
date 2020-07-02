@extends('layouts.appUsers')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Editando usuário') }}</div>

                    <div class="card-body">
                        <form action="{{route('users.edit', ['user' => $user->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Usuário') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email do usuário') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha do Usuário') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <input type="submit" value="Editar Usuário">
    
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
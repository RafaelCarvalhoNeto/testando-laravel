@extends('layouts.appUsers')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Cadastro de Usuários') }}</div>

                    <div class="card-body">
                        <form action="{{route('users.create')}}" method="post">
                            @csrf

                            <div class="form-group row">
                                
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Usuário') }}</label>

                                <div class="col-md-6">
                                    <input
                                    class="form-control{{$errors->has('name') ? ' is-invalid':''}}"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}">
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email do usuário') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha do Usuário') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                    
                            <input type="submit" value="Cadastrar usuário">
                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

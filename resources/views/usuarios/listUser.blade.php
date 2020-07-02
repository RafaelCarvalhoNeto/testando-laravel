@extends('layouts.appUsers')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="modal-header">
                        <h5 class="modal-title">UserID: {{$user->id}}</h5>
                        <button type="button" class="close">
                            <a href="/usuarios">Voltar</a>
                        </button>
                    </div>
                    <div class="card-body">
                        <h1>{{$user->name}}</h1>
                        <p>{{$user->email}}</p>
                        <p>{{ date('d/m/Y H:i', strtotime($user->create_at)) }}</p>
                        <a href="{{route("users.formEditUser",['user'=>$user->id])}}" class="btn btn-dark">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
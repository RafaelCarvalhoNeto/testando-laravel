@extends('layouts.appUsers')

@section('content')


<section class="row">
    <article class="col-12">
        <h1 class="text-center my-4">Listando Usuários</h1>
        <table class="table table-hover">
            <thead class="thead-dark bg-dark text-white">
                <tr>
                    <td scope="col">#ID</td>
                    <td scope="col">Nome:</td>
                    <td scope="col">Email:</td>
                    <td scope="col" colspan="2">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td scope="row">{{$user->id}}</td>
                        <td scope="row">{{$user->name}}</td>
                        <td scope="row">{{$user->email}}</td>
                        <td scope="row">
                            <a href="usuarios/{{$user->id}}">Ver Usuário</a>
                        </td>
                        <td scope="row">
                            <form action="{{route('user.destroy', ['user'=> $user->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user" value="{{$user->id}}">
                                <input type="submit" value="Remover">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{$users->links()}}
        </div>
    </article>
</section>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Gente</h1>
            <hr>
            <form action="{{route('user.index')}}" method="get" id="search-bar">
                <div class="row">
                    <div class="form-group col">
                        <input type="text" id="search" class="form-control">

                    </div>
                    <div class="form-group col btn-search">
                        <input type="submit" id="submit-button" value="Buscar" class="btn btn-success">

                    </div>

                </div>
            </form>
            @foreach($users as $user)

            <div class="profile-user">

                @if($user->image)
                <div class="container-avatar">
                    <img src="{{ route('user.avatar',['filename'=> $user->image ])}}" class="avatar">
                </div>
                @endif

                <div class="user-info">
                    <h1>{{'@'.$user->nick}}</h1>
                    <h2>{{$user->name. ' '. $user->surname}}</h2>
                    <p><span class="nickname date">{{' Registrado el '.$user->created_at->format('d-m-Y')}}.</span></p>
                    <a href="{{route('user.profile', ['id' => $user->id])}}" class="btn btn-success">Ver perfil</a>
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            @endforeach
            <!-- Paginacion -->
            <div class="clearfix"></div>
            {{$users->links()}}
        </div>

    </div>
</div>
@endsection
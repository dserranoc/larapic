@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>

            <div class="clearfix"></div>

            @foreach($user->images as $image)
            <!-- Mostrar card bootstrap -->
            @include('includes.image')
            @endforeach

        </div>

    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Fotos que te gustan</h1>
            <hr>

            @foreach($likes as $like)
                <!-- Mostrar card bootstrap -->
                @include('includes.image', ['image' => $like->image])
            @endforeach

            <!-- Paginacion -->
            <div class="clearfix"></div>
            {{$likes->links()}}
            
        </div>

    </div>
</div>
@endsection
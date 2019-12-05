@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            @foreach($images as $image)
                <!-- Mostrar card bootstrap -->
                
                @include('includes.image')
            @endforeach
            <!-- Paginacion -->
            <div class="clearfix"></div>
            {{$images->links()}}
        </div>

    </div>
</div>
@endsection
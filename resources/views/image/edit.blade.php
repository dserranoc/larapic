@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar imagen</div>

                <div class="card-body">
                    <form action="{{route('image.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-7">

                                @if($image)
                                <div class="container-avatar">
                                    <img src="{{ route('image.file',['filename'=> $image->image_path ])}}" class="avatar">
                                </div>
                                @endif

                                <input type="hidden" name="image_id" value="{{$image->id}}">
                    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-7">
                                <textarea name="description" id="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" required>{{$image->description}}</textarea>

                                @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">


                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Editar imagen" required>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">

                <div class="card-body">

                    @auth

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/videos" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="FormName" class=" col-form-label">Nombre del Video: </label>
                            <input type="text" class="form-control" name="nombre" id="nombre" pattern="[a-z A-Z]{5,}" required>
                        </div>

                        <div class="form-group">
                            <label for="FormDescription" class="col-form-label">Descripción: </label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" pattern="[a-zA-Z]{2,}" required></textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="FormDuration" class="col-form-label">Duración (h:mm:ss): </label>
                                <div class="row justify-content-center align-items-center">
                                    <input type="text" class="form-control col-md-2 text-right" style="margin-left:2%" name="horas" id="horas" pattern="[0-9]*" required> H
                                    <input type="text" class="form-control col-md-2 text-right" style="margin-left:2%" name="min" id="min" pattern="[0-5][0-9]" required> M 
                                    <input type="text" class="form-control col-md-2 text-right" style="margin-left:2%" name="seg" id="seg"  pattern="[0-5][0-9]" required>S
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="FormCategory" class="col-form-label">Categoría: </label>
                                <div>
                                    <select name="categoria" id="categoria" class="form-control" required>
                                        <option selected>Categoría...</option>
                                        @foreach ($categorias as $key=>$categoria)
                                            <option value="{{$key}}">{{$categoria}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="FormVideo" class="col-form-label">Video: </label>
                                
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="videoFile" id="videoFile" required>
                                    <label class="custom-file-label" for="videoFile">Seleccionar Video...</label>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="FormImage" class="col-form-label">Miniatura: </label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imgFile" id="imgFile" required>
                                    <label class="custom-file-label" for="imgFile">Seleccionar Miniatura...</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-2" style="background-color: Green; border-color: Green">Subir Video</button>
                        </div>

                    </form>
    
                    @endauth
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card ">

                <div class="card-body">

                    <form class="">
                        <div class="form-group">
                            <label for="FormName" class=" col-form-label">Nombre del Video: </label>
                            <input type="text" class="form-control " pattern="[a-zA-Z]{5,}" required>
                        </div>

                        <div class="form-group">
                            <label for="FormDescription" class="col-form-label">Descripción: </label>
                            <textarea class="form-control" id="" rows="3" pattern="[a-zA-Z]{2,}" required></textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="FormDuration" class="col-form-label">Duración: </label>
                                <div class="row justify-content-center align-items-center">
                                    <input type="text" class="form-control col-md-2" style="margin-left:2%"  pattern="[0-9]*" required> hr
                                    <input type="text" class="form-control col-md-2" style="margin-left:2%"  pattern="[0-5][0-9]" required> min 
                                    <input type="text" class="form-control col-md-2" style="margin-left:2%"  pattern="[0-5][0-9]" required>seg
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="FormCategory" class="col-form-label">Categoría: </label>
                                <div>
                                    <select id="inputState" class="form-control" required>
                                        <option selected>Categoría...</option>
                                        <option>laravel</option>
                                        <option>react</option>
                                        <option>angular</option>
                                        <option>yii2</option>
                                        <option>nodejs</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="FormVideo" class="col-form-label">Video: </label>
                                <input type="text" class="form-control" >
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="FormImage" class="col-form-label">Miniatura: </label>
                                <input type="text" class="form-control" >
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-2" style="background-color: Green; border-color: Green">Subir Video</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <table class="table text-center">
                        <thead class=" text-primary ">
                            <th>
                                {{ __('Nombre Video') }}
                            </th>
                            <th>
                                {{ __('Categoria') }}
                            </th>
                            <th>
                                {{ __('Estado') }}
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td>
                                        {{ $video->name_video }}
                                    </td>
                                    <td>
                                        {{ $video->categoria }}
                                    </td>
                                    <td>
                                        {{ $video->estado }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

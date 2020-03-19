<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->getPossibleStatuses();
        return view('uploadVideo',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate([
            'nombre'       => 'required|string|min:5|max:50',
            'descripcion' => 'required|string|min:2|max:250',
            'horas'   => 'required|integer',
            'min'   => 'required|integer',
            'seg'   => 'required|integer',
            'categoria'   => 'required|integer',
            'videoFile'   => 'required|mimes:mp4',
            'imgFile'   => 'required|mimes:jpeg,jpg',
        ]);

        $categorias = $this->getPossibleStatuses();

        $video = new Video();

        $video->name_video = request('nombre');
        $video->description = request('descripcion');
        $video->categoria = $categorias[request('categoria')];
        $video->estado = "por revisar";
        $video->user_id = Auth::id();
        $video->rutaVideo = "temp";
        $video->rutaImagen = "temp";

        $video->duration = request('horas').":".request('min').":".request('seg');
        $video->save();


        $destinationPathVideo = "./videos/users/$video->user_id/$video->id/video/";
        $videoName = $video->name . "." . $request->file('videoFile')->getClientOriginalExtension();
        $request->file('videoFile')->move($destinationPathVideo, $videoName);

        $video->rutaVideo = $destinationPathVideo . $videoName;


        $destinationPathImage = "./videos/users/$video->user_id/$video->id/image/";
        $image = $request->file('imgFile')->getClientOriginalName() . "." . $request->file('imgFile')->getClientOriginalExtension();
        $request->file('imgFile')->move($destinationPathImage, $image);
        
        $video->rutaImagen = $destinationPathImage . $image;

        $video->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }


    public function getPossibleStatuses(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM videos WHERE Field = "categoria"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }
}

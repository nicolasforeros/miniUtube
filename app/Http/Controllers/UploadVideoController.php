<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UploadVideoController extends Controller
{
    
    public function getPossibleStatuses(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM videos WHERE Field = "categoria"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = $this->getPossibleStatuses();
        return view('uploadVideo',['categorias' => $categorias]);
    }

}

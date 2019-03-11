<?php

namespace App\Http\Controllers;

use App\Material;

class IndexController extends Controller
{
    public function index() {
        //$materials = Material::where('deleted_at', 0)->orderBy('created_at','desc')->Paginate(20);
        $materials = $this->getMaterials();
        return view('index', ['materials'=>$materials]);
    }
    public function getMaterials()
    {
        $materials = Material::where('deleted_at', 0)->orderBy('created_at','desc')->Paginate(20);
        return $materials;
    }
}

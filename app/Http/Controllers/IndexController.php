<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class IndexController extends Controller
{
    public function index() {
        $materials = Material::where('deleted_at', 0)->orderBy('created_at','desc')->Paginate(20);
        return view('index', ['materials'=>$materials]);
    }
}

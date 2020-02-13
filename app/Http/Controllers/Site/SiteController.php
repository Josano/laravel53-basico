<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }
    public function index()
    {
        $teste = 123;
        $teste2 = 321;
        return view('site.home.index', compact('teste', 'teste2'));
    }

    public function contato()
    {
        return view('site.contact.index');
    }

    public function categoria($id)
    {
        return "listagem da categoria {$id}";
    }    

    public function categoriaOp($id = 1)
    {
        return "listagem da categoria {$id}";
    }  
}    


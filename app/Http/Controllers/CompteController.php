<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteController extends Controller
{
    public function index()
    {
        $data['resultat']=0;
        $data['clientMorals']=DB::select('select * from clientmoral');
        $data['clientPhysiques']=DB::select('select * from clientphysique');
        $data['typefrais']=DB::select('select * from typefrais');

        return view('compte/index',$data);
    }
}

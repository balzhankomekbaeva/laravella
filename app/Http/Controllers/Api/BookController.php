<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        return [
            [
                'id' => 1,
                'title'=>'Helicopter'
            ],
            [
                'id' => 2,
                'title'=>'Helicopter 2'
            ],
        ];
    }

    public function show($id){
        return $id;
    }
}

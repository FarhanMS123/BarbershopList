<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barbershop;

class barbershopController extends Controller
{
    public function index(){ // READ
        $bbl = barbershop::all();
        return view("index", ["list"=>$bbl]);
    }

    public function view_add(){
        return view("add_edit", ["barbershop"=>false]);
    }
    public function view_edit($id){
        $barbershop = barbershop::findOrFail($id);
        return view("add_edit", ["barbershop"=>$barbershop]);
    }

    public function add(Request $req){ // CREATE
        //
    }
    public function edit(Request $req, $id){ // UPDATE
        //
    }

    public function delete(Request $id){ // DELETE
        barbershop::destroy($id);
        return back();
    }
}

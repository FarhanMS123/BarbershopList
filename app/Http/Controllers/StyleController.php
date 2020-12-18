<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barbershop;
use App\Style;

class StyleController extends Controller
{
    public function index($id){
        $bs = barbershop::findOrFail($id);
        return view("styles", compact("bs"));
    }

    public function add(Request $req, $id){
        $req->validate([
            "name"=>"required|min:3",
            "price"=>"required|min:0"
        ]);

        // print_r($req);
        // die();

        $data = [
            "name" => $req->name,
            "price" => $req->price
        ];

        $bs = barbershop::findOrFail($id);

        $bs->styles()->create($data);

        return view("styles", compact("bs"));
    }

    public function edit(Request $req, $id){
        $req->validate([
            "name"=>"required|min:3",
            "price"=>"required|min:0"
        ]);

        $data = [
            "name" => $req->name,
            "price" => $req->price
        ];

        $style = Style::findOrFail($id);
        $style->update($data);

        return back();
    }

    public function delete(Request $req, $id){

        // print_r($id);

        Style::destroy($id);

        // $style = Style::findOrFail($id);
        // $bs = $style->barbershop();
        // $style->delete();

        return back();
    }
}

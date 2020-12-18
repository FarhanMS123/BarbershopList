<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\barbershop;

class barbershopController extends Controller
{
    public function index(){ // READ
        $bsl = barbershop::all();
        // print_r(public_path("logo", "hello"));
        // die();
        return view("index", ["list"=>$bsl]);
    }

    public function view_add(){
        return view("add", ["barbershop"=>false]);
    }
    public function view_edit($id){
        $bs = barbershop::findOrFail($id);
        return view("edit", compact("bs"));
    }

    public function add(Request $req){ // CREATE
        $req->validate([
            "logo"=>"nullable|image",
            "name"=>"required",
            "location"=>"required",
            "stars"=>"required|integer|min:1|max:5"
        ]);

        $data = [
            "name"=> $req->name,
            "location"=> $req->location,
            "stars"=> $req->stars
        ];

        if($req->hasFile("logo") && $req->file('logo')->isValid()){
            $file = $req->file("logo");
            $filename = time() . "_" . rand(10000,99999) . "_" . $file->getClientOriginalName();
            $req->file("logo")->move(public_path("logo"), $filename);
            $data["logo"] = $filename;
        }

        // print_r($data);
        // die();

        barbershop::create($data);
        return redirect("/");
    }
    public function edit(Request $req, $id){ // UPDATE
        $req->validate([
            "logo"=>"nullable|image",
            "name"=>"required",
            "location"=>"required",
            "stars"=>"required|integer|min:1|max:5"
        ]);

        $data = [
            "name"=> $req->name,
            "location"=> $req->location,
            "stars"=> $req->stars
        ];

        $bs = barbershop::findOrFail($id);

        if($req->hasFile("logo") && $req->file('logo')->isValid()){
            $filename = public_path("logo" . "/" . $bs->logo);
            if(File::exists($filename)){
                File::delete($filename);
            }

            $file = $req->file("logo");
            $filename = time() . "_" . rand(10000,99999) . "_" . $file->getClientOriginalName();
            $req->file("logo")->move(public_path("logo"), $filename);
            $data["logo"] = $filename;
        }

        $bs->update($data);
        return redirect("/");
    }

    public function delete($id){ // DELETE
        $bs = barbershop::findOrFail($id);
        $filename = public_path("logo" . "/" . $bs->logo);
        if(File::exists($filename)){
            File::delete($filename);
        }
        barbershop::destroy($id);
        return back();
    }
}

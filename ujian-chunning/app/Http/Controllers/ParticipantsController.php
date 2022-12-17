<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Models\Participant;

class ParticipantsController extends Controller
{

    public function index() {
        $participants = Participant::query()
            ->limit(5)
            ->offset(0) //index, ambil dari index ke berapa
            ->get();
        // $participant = Participant::get();
        return view("participants.list", ["participants" => $participants]);
    } //menampilkan seluruh data

    public function detail($id) {
        $participant = Participant::query()
            ->where("id", $id)
            ->first();
        return view("participants.detail", $participant);
    } //menampilkan sebuah data

    public function create(Request $request) {
        $request->validate([
            'name'     => 'required',
        ]);
        $payload = [
            "fullname"    =>  $request->input("fullname"),
            "gender"      =>  $request->input("gender"),
            "birthdate"   =>  $request->input("birthdate"),
            "address"     =>  $request->input("address"),
        ];
        $request->get("name");
        $request->all();
        $request->post("name");
        $request->acceptsJson();
        $request->allFiles();
        $request->bearerToken();
        $request->getMethod();
        $request->session();
        session();
        $request->url();
        $request->header("Authoriation");
        Participant::query()->create($payload);
        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $participant = Participant::query()
        ->where("id", $id)
        ->first();
        $participant->fill($request->all());
        $participant->save();
        return redirect()->back();
    }

    public function destroy($id) {
        $participant = Participant::query()
        ->where("id", $id)
        ->delete();
        return redirect()->back();
    }

    function upload(Request $request) {
        // if($request->method() == "GET") {
        //     $publicFile = public_path("gambar\\6392a8ef735ed.png");
        //     unlink($publicFile);
        //     return view('upload');
        // }
        if($request->method() == "GET") return view('upload');
        $file = $request->file("gambar");
        //$file->move("gambar", uniqid() . "." . $file->getClientOriginalName());
        //$file->move("gambar", $file->hashName());
        $path = $request->getHost() . "/gambar/" . $file->hashName();
        return redirect()->back();

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {

        $viewData = [];
        $viewData["title"] = "Admin biblioteca";
        $viewData["subtitle"] = "Admin biblioteca";
        $viewData["topics"] = AdminController::topics();

        $viewData["books"] = Book::all();

        return view("admin.index")->with("viewData", $viewData);
    }

    public function store(Request $request, $id) {

        $request -> validate([
            "name" => "required|max:255",
            "author" => "required|max:255",
            "year" => "required|numeric|gt:0",
            "topic" => "required",
            "picture" => "image",
        ]);

        $book = Book::findOrFail($id);
        $book->setName($request->input("name"));
        $book->setAuthor($request->input("author"));
        $book->setTopic($request->input("topic"));
        $book->setYear($request->input("year"));

        $book->save();

        if($request->hasFile("picture")) {

            $imageName = $book->getName().".".$request->file("picture")->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file("picture")->getRealPath()));
            
            $book->setPicture($imageName);
            $book->save();
        }

        $viewData = [];
        $viewData["title"] = "Admin biblioteca";
        $viewData["subtitle"] = "Admin biblioteca";
        $viewData["topics"] = AdminController::topics();

        $viewData["books"] = Book::all();

        return view("admin.index")->with("viewData", $viewData);
    }

    public function add(Request $request) {
        
        $request -> validate([
            "name" => "required|max:255",
            "author" => "required|max:255",
            "year" => "required|numeric|gt:0",
            "topic" => "required",
            "picture" => "required|image",
        ]);

        $book = new Book();
        $book->setName($request->input("name"));
        $book->setAuthor($request->input("author"));
        $book->setTopic($request->input("topic"));
        $book->setYear($request->input("year"));
        $book->setPicture("");

        $book->save();

        if($request->hasFile("picture")) {

            $imageName = $book->getName().".".$request->file("picture")->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file("picture")->getRealPath()));
            
            $book->setPicture($imageName);
            $book->save();
        }

        return back();
    }

    public function edit($id) {

        $viewData = [];
        $viewData["title"] = "Admin biblioteca";
        $viewData["subtitle"] = "Admin biblioteca";
        $viewData["topics"] = AdminController::topics();

        $viewData["book"] = Book::findOrFail($id);

        return view("admin.edit")->with("viewData", $viewData);
    }


    public function delete($id) {

        Book::destroy($id);
        return back();
    }

    private function topics() {

        return [ "Magia generale", "Cartomagia", "Monetomagia", "Mentalismo",
            "Magia da scena", "Mentalismo", "Matemagia", "Altro"];
    }
}

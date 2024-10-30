<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index() {

        $viewData = [];
        $viewData["title"] = "Biblioteca";
        $viewData["subtitle"] = "Biblioteca";

        $viewData["books"] = Book::all();

        return view("home.index")->with("viewData", $viewData);
    }

    public function show($id) {

        $viewData = [];
        $viewData["title"] = "Biblioteca";
        $viewData["subtitle"] = "Biblioteca";

        $viewData["book"] = Book::findOrFail($id);

        return view("home.show")->with("viewData", $viewData);
    }
}

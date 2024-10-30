<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AdminController extends Controller
{
    public function index() {

        $viewData = [];
        $viewData["title"] = "Admin biblioteca";
        $viewData["subtitle"] = "Admin biblioteca";

        $viewData["books"] = Book::all();

        return view("admin.index")->with("viewData", $viewData);
    }

    public function store(Request $request) {

    }

    public function add(Request $request) {

    }

    public function edit($id) {

        $viewData = [];
        $viewData["title"] = "Admin biblioteca";
        $viewData["subtitle"] = "Admin biblioteca";

        $viewData["book"] = Book::findOrFail($id);

        return view("admin.edit")->with("viewData", $viewData);
    }


    public function delete($id) {

        Book::destroy($id);
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\UserBook;

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
        
        $userId = 1;
        //$userId = UserBook::where('book_id', Book::findOrFail($id))->get()->getUserId();
        $viewData["user"] = "Federico Dutto";
        //$viewData["user"] = User::where('user_id', $userId)->getName();
        $viewData["status"] = 0;

        //$viewData["status"] = UserBook::where('book_id', Book::findOrFail($id))->get()->getStatus();
        
        return view("home.show")->with("viewData", $viewData);
    }
}

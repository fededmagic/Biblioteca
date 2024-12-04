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
        
        $user_id = Auth::user()->getId();
        $viewData["books"] = Book::all();

        return view("home.mybooks")->with("viewData", $viewData);
    }

    public function assign($book_id) {

        $userBook = new UserBook();
        $userBook->setBookId($book_id);
        $userBook->setUserId(Auth::user()->getId());
        $userBook->setStatus(1);

        $expire_date = Carbon::now()->addMonth(3);
        $userBook->setExpiresAt($expire_date);

        return back();
    } //manca la gestione della vista mybooks (route)

    //public function unassing() {}
}

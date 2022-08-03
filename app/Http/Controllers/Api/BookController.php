<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BookController extends Controller
{

    public function index(Request $request)
    {
        $perPage_default = 10;
        //request è la richiesta completa dell'utente
        $perPage = $request->query('perPage', 12);
        //se la richiesta è sbagliata
        if($perPage < 1 || $perPage > 150){
             $perPage = $perPage_default;
        }

        //con il with richiamo le funzioni del model Post per richiamare user, category e tags e avere tutto nella risposta
        $books = Book::with(['users'])->paginate($perPage);

        return response()->json([
            'success' => true,
            'response' =>$books
        ]);
    }

    //post random homepage
    public function random()
    {
        $sql = Book::with(['users'])->limit(9)->inRandomOrder();
        $books = $sql->get();

        return response()->json([
            // 'sql'       => $sql->toSql(), // solo per debugging
            'success'   => true,
            'result'    => $books
        ]);
    }
    public function show(Book $book)
    {
        $book = Book::with(['users'])->first();

        if($book) {
            return response()->json([
                'success' => true,
                'result' =>$book
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}

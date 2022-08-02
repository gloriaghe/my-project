<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    protected $perPage = 15;

    public function index()
    {
        $books = Book::paginate($this->perPage);
        return view('admin.books.index', compact('books'));
    }

    public function myIndex()
    {

        $books = Auth::user()->books()->paginate($this->perPage);

        return view('admin.books.index', compact('books'));
    }
    public function create()
    {
        return view('admin.books.create', compact('books'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:100',
            'image'     => 'required_without:content|nullable|url',
            'description'   => 'required_without:image|nullable|string|max:5000',
            'author'   => 'nullable|string|max:100',
        ]);
 //con il + aggiungiamo all'array l'Id dell'utente
         $data = $request->all() + [
             'user_id' => Auth::id(),
         ];

        $book = Book::create($data);

        return redirect()->route('admin.books.show', ['book' => $book]);
    }


    public function show(Book $book)
    {
        return view('admin.books.show', compact('books'));

    }


    public function edit(Book $book)
    {
        if(Auth::id() != $book->user_id) abort(401);

        return view('admin.books.edit', compact('books'));

    }


    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'     => 'required|string|max:100',
            'image'     => 'required_without:content|nullable|url',
            'description'   => 'required_without:image|nullable|string|max:5000',
            'author'   => 'nullable|string|max:100',
        ]);

        $data = $request->all();

        $book->update($data);
        return redirect()->route('admin.books.show', ['books' => $books]);

    }


    public function destroy(Book $book)
    {
        if (Auth::id() != $book->user_id) abort(401);

        $book->delete();

        return redirect()->route('admin.bookd.index')->with('deleted', "Il libro {$book->title} è stato eliminato");
    }
}

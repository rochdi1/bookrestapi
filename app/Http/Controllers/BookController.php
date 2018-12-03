<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\book;
use App\thumbnail;
use App\author;
use App\Http\Resources\BookResource;
use Response;

class BookController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            return BookResource::collection(Book::with('authors', 'thumbnails')->get());
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $book = Book::create($request->all());

        return response()->json($book, 201);
    }

 
    public function show($isbn)
    {
       return  new BookResource(Book::with('authors', 'thumbnails')->where('isbn', $isbn)->first());  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        //
        $book->update($request->all());
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
    
        $book = Book::with('authors', 'thumbnails')->where('isbn', $isbn)->first();
        $book->delete();
        return 204;
    }


    public function getSearchResults(Request $request, $suche) {




          //  $search_books = Author::with('books.thumbnails')->where('author_name', 'like', "%{$suche}%")->get();

            $search_books = Book::with('authors', 'thumbnails')
            ->whereHas('authors', function($query) use ($suche)
                {
                    $query->where('author_name', 'like', "%{$suche}%");

                }

            )->orWhere('isbn', 'like', "%{$suche}%")
               // ->orWhere('title', 'like', "%{$suche}%")
                ->orWhere('published', 'like', "%{$suche}%")
                ->orWhere('subtitle', 'like', "%{$suche}%")
                ->orWhere('rating', 'like', "%{$suche}%")
                ->orWhere('description', 'like', "%{$suche}%")
                // ->orWhere('authors.author_name', 'like', "%{$suche}%")

                ->get();






//dd($search_books);
                      //   $search_books2 = Author::where('author_name', 'like', "%{$suche}%")->get();


 // $search_books2 = BookResource::collection(Author::with('books')->orWhere('author_name', 'like', "%{$suche}%")->first());

                  //  $search_books->authors = Author::where('author_name', 'like', "%{$suche}%")->get();
                   // dump($search_books2);

                       //  dump(Book::with('authors', 'thumbnails')->where('isbn', 'like', "%{$suche}%")->get());


        return  BookResource::collection($search_books);
    //    dd($search_books);
                   //     return $search_books;
    }

}

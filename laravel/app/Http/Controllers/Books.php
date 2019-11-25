<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book; //model Book
use App\Author; //model Author

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookListResource;

class Books extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookListResource::collection(Book::all());
        // // return $author->books;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $request->all();

        // store Book object in variable
        $book = Book::create($data);
        // return the resource
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book_id)
    {
        // return the resource
        return new BookResource($book_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book_id)
    {
        $data = $request->all();
        $book_id->fill($data)->save();
        return new BookResource($book_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book_id)
    {
        $book_id->delete();
        return response(null, 204);
    }
}

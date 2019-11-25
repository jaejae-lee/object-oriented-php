<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorBooksResource;

class Authors extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Author $author)
    {
        // return $author->books;
        return AuthorResource::collection(Author::all()); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request, Author $author)
    {
        // $book = new Book($request->all());
        // $author->books()->save($author);
        // return new AuthorResource($author);

        $data = $request->all();
        $author = Author::create($data);
        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author_id)
    {
        return new AuthorResource($author_id);
    }

    public function show_books(Author $author_id)
    {
        return new AuthorBooksResource($author_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, Author $author_id)
    {
        $author = $request->all();
        $author_id->fill($author)->save();
        return new AuthorResource($author_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author_id)
    {
        $author_id->delete();
        return response(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book; 
use App\Shop;

use App\Http\Requests\ShopRequest;
use App\Http\Resources\ShopResource;
use App\Http\Resources\ShopBooksResource;

class Shops extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Shop $shop)
    {
        return ShopResource::collection(Shop::all()); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request, Shop $shop)
    {
        $data = $request->all();
        $shop = Shop::create($data);
        return new ShopResource($shop);


        /*// only get the title and article fields
        $data = $request->only(["name", "online"]);
        $article = Shop::create($data);
        // get back a collection of tag objects
        $books = Book::fromStrings($request->get("books"));

        // sync the tags: needs an array of Tag ids
        $shop->books()->sync($tags->pluck("id")->all());
        return new ShopResource($shop);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop_id)
    {
        return new ShopResource($shop_id);
    }

    public function show_books(Shop $shop_id)
    {
        return new ShopBooksResource($shop_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request, Shop $shop_id)
    {
        $shop = $request->all();
        $shop_id->fill($shop)->save();
        return new ShopResource($shop_id);
    }

    public function update_books(ShopRequest $request, Shop $shop_id)
    {
        //dd($shop_id);
        //$shop = Shop::find($shop_id);
        $books = Book::fromIDs($request->get("books"));
        // dd($books); 
       
        $shop_id->books()->sync($books->pluck("id")->all());
        return new ShopBooksResource($shop_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop_id)
    {
        $shop_id->delete();
        return response(null, 204);
    }
}

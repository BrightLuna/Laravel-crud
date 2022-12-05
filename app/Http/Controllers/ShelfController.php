<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShelfController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all data from database
        $datasmanga = DB::select("SELECT * FROM shelf left join manga on manga.id_shelf = shelf.id_shelf WHERE recycled = 0");
        $datasdoujin = DB::select("SELECT * FROM shelf left join doujin on doujin.id_shelf = shelf.id_shelf WHERE recycled = 0");
        $datasmagazine = DB::select("SELECT * FROM shelf left join magazine on magazine.id_shelf = shelf.id_shelf WHERE recycled = 0");
        return view('shelf.index')->with('datasmanga', $datasmanga)->with('datasdoujin', $datasdoujin)->with('datasmagazine', $datasmagazine);
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
        DB::insert(
            'INSERT INTO shelf(id_shelf) VALUES (:id_shelf)',
            [
                'id_shelf' => $request->id_shelf,
            ]
        );

        return redirect()->route('shelf.index')->with('success', 'Success! A shelf has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $datasmanga = DB::select("SELECT * FROM shelf left join manga on manga.id_shelf = shelf.id_shelf WHERE recycled = 0 AND shelf.id_shelf = $search");
        $datasdoujin = DB::select("SELECT * FROM shelf left join doujin on doujin.id_shelf = shelf.id_shelf WHERE recycled = 0 AND shelf.id_shelf = $search");
        $datasmagazine = DB::select("SELECT * FROM shelf left join magazine on magazine.id_shelf = shelf.id_shelf WHERE recycled = 0 AND shelf.id_shelf = $search");
        return view('shelf.index')->with('datasmanga', $datasmanga)->with('datasdoujin', $datasdoujin)->with('datasmagazine', $datasmagazine);
    }

}

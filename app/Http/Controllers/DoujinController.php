<?php

namespace App\Http\Controllers;

// use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoujinController extends Controller
{

    //if not logged in redirect to login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = DB::select("SELECT * FROM doujin WHERE recycled = 0");
        $recycles = DB::select("SELECT * FROM doujin WHERE recycled = 1");

        return view('doujin.index')->with('datas', $datas)->with('recycles', $recycles);
    }

    public function create()
    {
        $shelfs = DB::select("SELECT * FROM shelf");

        return view('doujin.add')->with('shelfs', $shelfs);
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_doujin' => 'required',
            'doujin_title' => 'required',
            'doujin_author' => 'required',
            'price' => 'required',
            'id_shelf' => 'required',
        ]);

        DB::insert(
            'INSERT INTO doujin(id_doujin, doujin_title, doujin_author, price, id_shelf) VALUES (:id_doujin, :doujin_title, :doujin_author, :price, :id_shelf)',
            [
                'id_doujin' => $request->id_doujin,
                'doujin_title' => $request->doujin_title,
                'doujin_author' => $request->doujin_author,
                'price' => $request->price,
                'id_shelf' => $request->id_shelf,
            ]
        );

        return redirect()->route('doujin.index')->with('success', 'Success! A doujin has been saved');
    }

    public function edit($id_doujin)
    {
        $data = DB::table('doujin')->where('id_doujin', $id_doujin)->first();
        $shelfs = DB::select("SELECT * FROM shelf");

        return view('doujin.edit')->with('data', $data)->with('shelfs', $shelfs);
    }

    public function update($id_doujin, Request $request)
    {
        $request->validate(
            [
                // 'id_doujin' => 'required',
                'doujin_title' => 'required',
                'doujin_author' => 'required',
                'price' => 'required',
                'id_shelf' => 'required',
            ]
        );

        DB::update(
            'UPDATE doujin SET doujin_title = :doujin_title, doujin_author = :doujin_author, price = :price, id_shelf = :id_shelf WHERE id_doujin = :id_doujin',
            [
                'id_doujin' => $id_doujin,
                'doujin_title' => $request->doujin_title,
                'doujin_author' => $request->doujin_author,
                'price' => $request->price, 
                'id_shelf' => $request->id_shelf,
            ]
        );

        return redirect()->route('doujin.index')->with('success', 'Success! A doujin has been updated');
    }

    public function search(Request $request)
    {
        //request search
        $search = $request->search;

        $datas = DB::select("SELECT * FROM doujin WHERE (doujin_title LIKE '%$search%' OR doujin_author LIKE '%$search%') AND recycled = 0");
        $recycles = DB::select("SELECT * FROM doujin WHERE (doujin_title LIKE '%$search%' OR doujin_author LIKE '%$search%') AND recycled = 1");

        return view('doujin.index')->with('datas', $datas)->with('recycles', $recycles);
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM doujin WHERE id_doujin = :id_doujin', ['id_doujin' => $id]);

        return redirect()->route('doujin.index')->with('success', 'Success! A doujin has been deleted');
    }
    
    public function recycle($id)
    {
        DB::update('UPDATE doujin set recycled = 1 WHERE id_doujin = :id_doujin', ['id_doujin' => $id]);
        return redirect()->route('doujin.index')->with('success', 'Success! A doujin has been recycled');
    }

    public function restore($id)
    {
        DB::update('UPDATE doujin set recycled = 0 WHERE id_doujin = :id_doujin', ['id_doujin' => $id]);
        return redirect()->route('doujin.index')->with('success', 'Success! A doujin has been restored');
    }
}

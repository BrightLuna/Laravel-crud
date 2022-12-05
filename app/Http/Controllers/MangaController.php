<?php

namespace App\Http\Controllers;

// use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MangaController extends Controller
{

    //if not logged in redirect to login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = DB::select("SELECT * FROM manga WHERE recycled = 0");
        $recycles = DB::select("SELECT * FROM manga WHERE recycled = 1");

        return view('manga.index')->with('datas', $datas)->with('recycles', $recycles);
    }

    public function create()
    {
        return view('manga.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_manga' => 'required',
            'manga_title' => 'required',
            'manga_author' => 'required',
            'genre' => 'required',
            'price' => 'required',
            'id_shelf' => 'required',
            
        ]);

        DB::insert(
            'INSERT INTO manga(id_manga, manga_title, manga_author, price, genre, id_shelf) VALUES (:id_manga, :manga_title, :manga_author, :price, :genre, :id_shelf)',
            [
                'id_manga' => $request->id_manga,
                'manga_title' => $request->manga_title,
                'manga_author' => $request->manga_author,
                'price' => $request->price,
                'genre' => $request->genre,
                'id_shelf' => $request->id_shelf,
            ]
        );

        return redirect()->route('manga.index')->with('success', 'Success! A manga has been saved');
    }

    public function edit($id_manga)
    {
        $data = DB::table('manga')->where('id_manga', $id_manga)->first();

        return view('manga.edit')->with('data', $data);
    }

    public function update($id_manga, Request $request)
    {
        $request->validate(
            [
                // 'id_manga' => 'required',
                'manga_title' => 'required',
                'manga_author' => 'required',
                'price' => 'required',
                'genre' => 'required',
                'id_shelf' => 'required',
            ]
        );

        DB::update(
            'UPDATE manga SET manga_title = :manga_title, manga_author = :manga_author, price = :price, genre = :genre, id_shelf = :id_shelf WHERE id_manga = :id_manga',
            [
                'id_manga' => $id_manga,
                'manga_title' => $request->manga_title,
                'manga_author' => $request->manga_author,
                'price' => $request->price,
                'genre' => $request->genre,
                'id_shelf' => $request->id_shelf,
            ]
        );

        return redirect()->route('manga.index')->with('success', 'Success! A manga has been updated');
    }

    public function search(Request $request)
    {
        //request search
        $search = $request->search;

        $datas = DB::select("SELECT * FROM manga WHERE (manga_title LIKE '%$search%' OR manga_author LIKE '%$search%') AND recycled = 0");
        
        $recycles = DB::select("SELECT * FROM manga WHERE (manga_title LIKE '%$search%' OR manga_author LIKE '%$search%') AND recycled = 1");
        return view('manga.index')->with('datas', $datas)->with('recycles', $recycles);
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM manga WHERE id_manga = :id_manga', ['id_manga' => $id]);

        return redirect()->route('manga.index')->with('success', 'Success! A manga has been deleted');
    }


    public function recycle($id)
    {
        DB::update('UPDATE manga set recycled = 1 WHERE id_manga = :id_manga', ['id_manga' => $id]);
        return redirect()->route('manga.index')->with('success', 'Success! A manga has been recycled');
    }

    public function restore($id)
    {
        DB::update('UPDATE manga set recycled = 0 WHERE id_manga = :id_manga', ['id_manga' => $id]);
        return redirect()->route('manga.index')->with('success', 'Success! A manga has been restored');
    }
}

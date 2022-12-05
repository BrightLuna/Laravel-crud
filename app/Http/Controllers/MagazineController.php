<?php

namespace App\Http\Controllers;

// use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MagazineController extends Controller
{

    //if not logged in redirect to login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = DB::select("SELECT * FROM magazine WHERE recycled = 0");
        $recycles = DB::select("SELECT * FROM magazine WHERE recycled = 1");

        return view('magazine.index')->with('datas', $datas)->with('recycles', $recycles);
    }

    public function create()
    {
        return view('magazine.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_magazine' => 'required',
            'magazine_title' => 'required',
            'magazine_author' => 'required',
            'price' => 'required',
            'id_shelf' => 'required',
        ]);

        DB::insert(
            'INSERT INTO magazine(id_magazine, magazine_title, magazine_author, price, id_shelf) VALUES (:id_magazine, :magazine_title, :magazine_author, :price, :id_shelf)',
            [
                'id_magazine' => $request->id_magazine,
                'magazine_title' => $request->magazine_title,
                'magazine_author' => $request->magazine_author,
                'price' => $request->price,
                'id_shelf' => $request->id_shelf,
            ]
        );

        return redirect()->route('magazine.index')->with('success', 'Success! A magazine has been saved');
    }

    public function edit($id_magazine)
    {
        $data = DB::table('magazine')->where('id_magazine', $id_magazine)->first();

        return view('magazine.edit')->with('data', $data);
    }

    public function update($id_magazine, Request $request)
    {
        $request->validate(
            [
                // 'id_magazine' => 'required',
                'magazine_title' => 'required',
                'magazine_author' => 'required',
                'price' => 'required',
                'id_shelf' => 'required',
            ]
        );

        DB::update(
            'UPDATE magazine SET magazine_title = :magazine_title, magazine_author = :magazine_author, price = :price, id_shelf = :id_shelf WHERE id_magazine = :id_magazine',
            [
                'id_magazine' => $id_magazine,
                'magazine_title' => $request->magazine_title,
                'magazine_author' => $request->magazine_author,
                'price' => $request->price,
                'id_shelf' => $request->id_shelf,
            ]
        );

        return redirect()->route('magazine.index')->with('success', 'Success! A magazine has been updated');
    }

    public function search(Request $request)
    {
        //request search
        $search = $request->search;

        $result = DB::select("SELECT * FROM magazine WHERE (magazine_title LIKE '%$search%' OR magazine_author LIKE '%$search%') AND recycled = 0");
        $recycles = DB::select("SELECT * FROM magazine WHERE (magazine_title LIKE '%$search%' OR magazine_author LIKE '%$search%') AND recycled = 1");

        return view('magazine.index')->with('datas', $result)->with('recycles', $recycles);
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM magazine WHERE id_magazine = :id_magazine', ['id_magazine' => $id]);

        return redirect()->route('magazine.index')->with('success', 'Success! A magazine has been deleted');
    }

    public function recycle($id)
    {
        DB::update('UPDATE magazine set recycled = 1 WHERE id_magazine = :id_magazine', ['id_magazine' => $id]);
        return redirect()->route('magazine.index')->with('success', 'Success! A magazine has been recycled');
    }

    public function restore($id)
    {
        DB::update('UPDATE magazine set recycled = 0 WHERE id_magazine = :id_magazine', ['id_magazine' => $id]);
        return redirect()->route('magazine.index')->with('success', 'Success! A magazine has been restored');
    }
}

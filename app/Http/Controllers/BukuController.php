<?php

namespace App\Http\Controllers;

// use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bukuController extends Controller
{
    public function index()
    {
        $datas = DB::select('select * from buku');

        return view('buku.index')
            ->with('datas', $datas);
    }

    public function create()
    {
        return view('buku.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'judul_buku' => 'required',
            'penulis_buku' => 'required',
            'tahun_terbit' => 'required',
            'genre' =>'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        // Buku::insert([
        //     'id_buku'=> $request->id_buku,
        //     'judul_buku'=>$request->judul_buku,
        //     'penulis_buku'=>$request->penulis_buku,
        //     'tahun_terbit'=> $request->tahun_terbit
        // ]);

        DB::insert(
            'INSERT INTO buku(id_buku, judul_buku, penulis_buku, tahun_terbit, genre) VALUES (:id_buku, :judul_buku, :penulis_buku, :tahun_terbit, :genre)',
            [
                'id_buku' => $request->id_buku,
                'judul_buku' => $request->judul_buku,
                'penulis_buku' => $request->penulis_buku,
                'tahun_terbit' => $request->tahun_terbit,
                'genre' => $request->genre
            ]
        );

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('buku')->where('id_buku', $id)->first();

        return view('buku.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate(
            [
                'id_buku' => 'required',
                'judul_buku' => 'required',
                'penulis_buku' => 'required',
                'tahun_terbit' => 'required',
                'genre' => 'required',
            ]
        );

        DB::update(
            'UPDATE buku SET id_buku = :id_buku, judul_buku = :judul_buku, penulis_buku = :penulis_buku, tahun_terbit = :tahun_terbit, genre = :genre WHERE id_buku = :id',
            [
                'id' => $id,
                'id_buku' => $request->id_buku,
                'judul_buku' => $request->judul_buku,
                'penulis_buku' => $request->penulis_buku,
                'tahun_terbit' => $request->tahun_terbit,
                'genre' => $request->genre
            ]
        );

        return redirect()->route('buku.index')->with('success', 'Data Buku berhasil diubah');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM buku WHERE id_buku = :id_buku', ['id_buku' => $id]);

        return redirect()->route('buku.index')->with('success', 'Data Buku berhasil dihapus');
    }
}

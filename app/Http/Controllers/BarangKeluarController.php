<?php

namespace App\Http\Controllers;

use App\Models\Barang_Keluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang_Keluar  $barang_Keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_Keluar $barang_Keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang_Keluar  $barang_Keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang_Keluar $barang_Keluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang_Keluar  $barang_Keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_Keluar $barang_Keluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang_Keluar  $barang_Keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_Keluar $barang_Keluar)
    {
        //
    }
    //! get data barang_keluar
    public function getAllBarang_keluar() {
      $barang_keluar = Barang_Keluar::get()->toJson(JSON_PRETTY_PRINT);
      return response($barang_keluar, 200);
    }
    //! find barang_keluar by id
     public function getBarang_keluar($id) {
      if (Barang_Keluar::where('id', $id)->exists()) {
        $barang_keluar = Barang_Keluar::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($barang_keluar, 200);
      } else {
        return response()->json([
          "message" => "barang_keluar not found"
        ], 404);
      }
    }
    //! create data barang_keluar
    public function createBarang_keluar(Request $request) {
      $barang_keluar = new Barang_Keluar;
        $barang_keluar->id_barang= $request->id_barang;
        $barang_keluar->nama_barang= $request->nama_barang;
        $barang_keluar->qty= $request->qty;
        $barang_keluar->kode_barang= $request->kode_barang;
      $barang_keluar->save();

      return response()->json([
        "message" => "barang_keluar record created"
      ], 201);
    }
    //! update data barang_keluar
    public function updateBarang_keluar(Request $request, $id) {
      if (Barang_Keluar::where('id', $id)->exists()) {
        $barang_keluar = Barang_Keluar::find($id);

        $barang_keluar->id_barang= $request->id_barang;
        $barang_keluar->nama_barang= $request->nama_barang;
        $barang_keluar->qty= $request->qty;
        $barang_keluar->kode_barang= $request->kode_barang;
        // $barang_keluar->id_barang = is_null($request->id_barang) ? $barang_keluar->id_barang : $barang_keluar->nama_barang_keluar;
        // $barang_keluar->nama_barang = is_null($request->nama_barang) ? $barang_keluar->nama_barang : $barang_keluar->nama_barang;
        // $barang_keluar->qty = is_null($request->qty) ? $barang_keluar->qty : $barang_keluar->qty;
        // $barang_keluar->kode_barang = is_null($request->kode_barang) ? $barang_keluar->kode_barang : $barang_keluar->kode_barang;
        $barang_keluar->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "barang_keluar not found"
        ], 404);
      }
    }
    //! delete data barang_keluar

        public function deleteBarang_keluar ($id) {
      if(Barang_keluar::where('id', $id)->exists()) {
        $barang_keluar = Barang_keluar::find($id);
        $barang_keluar->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "barang_keluar not found"
        ], 404);
      }
    }
}

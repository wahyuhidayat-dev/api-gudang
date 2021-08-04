<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
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
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }

    //! get data barang
    public function getAllBarang() {
      $barang = Barang::get()->toJson(JSON_PRETTY_PRINT);
      return response($barang, 200);
    }
    //! find barang by id
     public function getBarang($id) {
      if (Barang::where('id', $id)->exists()) {
        $barang = Barang::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($barang, 200);
      } else {
        return response()->json([
          "message" => "barang not found"
        ], 404);
      }
    }
    //! create data barang
    public function createBarang(Request $request) {
      $barang = new Barang;
        $barang->nama_barang= $request->nama_barang;
        $barang->qty= $request->qty;
        $barang->keterangan= $request->keterangan;
        $barang->nama_lokasi= $request->nama_lokasi;
        $barang->kode_barang= $request->kode_barang;
      $barang->save();

      return response()->json([
        "message" => "barang record created"
      ], 201);
    }
    //! update data barang
    public function updateBarang(Request $request, $id) {
      if (Barang::where('id', $id)->exists()) {
        $barang = Barang::find($id);
        $barang->nama_barang= $request->nama_barang;
        $barang->qty= $request->qty;
        $barang->keterangan= $request->keterangan;
        $barang->nama_lokasi= $request->nama_lokasi;
        $barang->kode_barang= $request->kode_barang;

        // $barang->nama_barang = is_null($request->nama_barang) ? $barang->nama_barang : $barang->nama_barang;
        // $barang->qty = is_null($request->qty) ? $barang->qty : $barang->qty;
        // $barang->keterangan = is_null($request->keterangan) ? $barang->keterangan : $barang->keterangan;
        // $barang->nama_lokasi = is_null($request->nama_lokasi) ? $barang->nama_lokasi : $barang->nama_lokasi;
        // $barang->kode_barang = is_null($request->kode_barang) ? $barang->kode_barang : $barang->kode_barang;
        $barang->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "barang not found"
        ], 404);
      }
    }
    //! delete data barang

        public function deleteBarang ($id) {
      if(Barang::where('id', $id)->exists()) {
        $barang = Barang::find($id);
        $barang->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "barang not found"
        ], 404);
      }
    }
}

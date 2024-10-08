<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::with('fakultas')->get();
        $data['message'] = true;
        $data['result'] = $prodi;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(rules: [
            'nama'=> 'required:unique:prodis',
            'id_fakultas'=> 'required'
        ]);

        $result = Prodi::create(Attributes: $validate); //simpn ke tabel
        //Prodi
        if($result){
            $data['success'] = true;
            $data['message'] = 'Data Prodi berhasil disimpan';
            $data['result'] = $result;
            return response()->json(data: $data, status: Response::HTTP_CREATED);
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}

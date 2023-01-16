<?php

namespace App\Http\Controllers\referensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Refsession;

class SessiontimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Refsession::all();

            return response()->json(['status' => "show", "message" => "Menampilkan Data" , 'data' => $data]);

        } catch (\Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $requestData = $request->all();
            Refsession::create($requestData);
            return response()->json(["status" => "success", "message" => "Berhasil Menambahkan Data"]);

        } catch (\Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages/referensi/sessionsetting');
        
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
        $requestData = $request->all();
        try {
    
            $data = Refsession::findOrFail($id);
            $data->update($requestData);
            $data->save();

            return response()->json(["status" => "success", "message" => "Berhasil Ubah Data"]);

        } catch (\Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Refsession::findOrFail($id);
            $data->delete();
            return response()->json(["status" => "success", "message" => "Berhasil Hapus Data"]);

        } catch (\Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
}

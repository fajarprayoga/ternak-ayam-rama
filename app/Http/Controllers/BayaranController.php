<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bayaran;
use App\AnakKandang;
class BayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->type=="datatable") {
            $data = Bayaran::select('*')->where('jenis','GAJI')->with('anakKandang');

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    return "<a href='#' data-id='" . $data->id . "' data-url='" . route('bayaran.destroy', $data->id) . "' class='delete-item btn btn-danger'><i class='fa fa-trash'></i>Hapus</a>";
                })
                ->addColumn('anak_kandang', function ($data) {
                    return $data->anakKandang->nama;
                })          
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return view('pages.bayaran.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = AnakKandang::get();
        return view('pages.bayaran.create',[
            'data' => $data
        ]);
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
        $body = $request->all();
        $body['jenis'] = "GAJI";
        $user = Bayaran::create($body);
        if ($user) {
            return redirect()->route('bayaran.index');
        } else {
            return redirect()->back()->withErrors(['Gagal menyimpan data']);
        }
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
        $data = Bayaran::find($id);
        return view('pages.bayaran.edit',[
            'data' => $data
        ]);

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
        $data = Bayaran::find($id);

        $body = $request->all();
     
        $data->update($body);
        if ($data) {
            return redirect()->route('bayaran.index');
        } else {
            return redirect()->back()->withErrors(['Gagal menyimpan data']);
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
        //
        $user = Bayaran::find($id);
        if($user) {
            $user->delete();
        }

        return response()->json(true);
    }
}

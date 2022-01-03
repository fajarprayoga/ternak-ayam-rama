<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokPakan;
class StokPakanController extends Controller
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
            $data = StokPakan::select('*');

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    return "<a href='".route('stok-pakan.edit',$data->id)."' class='btn btn-warning'><i class='fa fa-edit'></i>Edit</a> <a href='#' data-id='" . $data->id . "' data-url='" . route('stok-pakan.destroy', $data->id) . "' class='delete-item btn btn-danger'><i class='fa fa-trash'></i>Hapus</a>";
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return view('pages.stok_pakan.index');
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
        return view('pages.stok_pakan.create');
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

        $user = StokPakan::create($body);
        if ($user) {
            return redirect()->route('stok-pakan.index');
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
        $data = StokPakan::find($id);
        return view('pages.stok_pakan.edit',[
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
        $data = StokPakan::find($id);

        $body = $request->all();
     
        $data->update($body);
        if ($data) {
            return redirect()->route('stok-pakan.index');
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
        $user = StokPakan::find($id);
        if($user) {
            $user->delete();
        }

        return response()->json(true);
    }
}

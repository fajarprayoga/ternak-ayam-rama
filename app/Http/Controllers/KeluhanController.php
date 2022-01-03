<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluhan;
use App\Obat;
class KeluhanController extends Controller
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
            $data = Keluhan::select('*')->with('anakKandang','obat');

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    return "<a href='".route('keluhan.edit',$data->id)."' class='btn btn-warning'><i class='fa fa-edit'></i>Edit</a> <a href='#' data-id='" . $data->id . "' data-url='" . route('keluhan.destroy', $data->id) . "' class='delete-item btn btn-danger'><i class='fa fa-trash'></i>Hapus</a>";
                })
                ->addColumn('anak_kandang', function ($data) {
                    return $data->anakKandang->nama;
                }) 
                ->addColumn('obat', function ($data) {
                    return $data->obat->nama;
                })            
                ->rawColumns(['action'])
                ->make(true);
        } else {
            if(auth()->guard('web')->check()) {
                return view('pages.keluhan.index-admin');

            } else {
                return view('pages.keluhan.index');

            }
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
        $data = Obat::get();
        return view('pages.keluhan.create',[
            'obat' => $data
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
        $body['anak_kandang_id'] = auth()->guard('anak_kandang')->user()->id;
        $user = Keluhan::create($body);
        if ($user) {
            return redirect()->route('keluhan.index');
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
        $data = Keluhan::find($id);
        return view('pages.keluhan.edit',[
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
        $data = Keluhan::find($id);

        $body = $request->all();
     
        $data->update($body);
        if ($data) {
            return redirect()->route('keluhan.index');
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
        $user = Keluhan::find($id);
        if($user) {
            $user->delete();
        }

        return response()->json(true);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use App\Jadwal;
class PengeluaranController extends Controller
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
            $data = Pengeluaran::select('pengeluaran.*','jadwal.tanggal as jadwal_doc')->with('anak_kandang')->join('jadwal','jadwal.id','=','pengeluaran.jadwal_id');
            if(auth()->guard('anak_kandang')->check()) {
                $data = $data->where('anak_kandang_id',auth()->guard('anak_kandang')->user()->id);
            }
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    if(auth()->guard('anak_kandang')->check()) {
                        return "<a href='".route('pengeluaran.edit',$data->id)."' class='btn btn-warning'><i class='fa fa-edit'></i>Edit</a> <a href='#' data-id='" . $data->id . "' data-url='" . route('pengeluaran.destroy', $data->id) . "' class='delete-item btn btn-danger'><i class='fa fa-trash'></i>Hapus</a>";
    
                    } else {
                        $action = "<a href='".route('pengeluaran.edit',$data->id)."' class='btn btn-warning'><i class='fa fa-edit'></i>Edit</a> <a href='#' data-id='" . $data->id . "' data-url='" . route('pengeluaran.destroy', $data->id) . "' class='delete-item btn btn-danger'><i class='fa fa-trash'></i>Hapus</a>";
                        if ($data->anak_kandang != null and $data->status == "MENUNGGU KONFIRMASI") {
                            $action = "<a href='".route('pengeluaran.approve',$data->id)."' class='btn btn-info'><i class='fa fa-check'></i>Setujui</a>  ".$action;
                        }
                        return $action;
                    }
                })
                ->addColumn('anak_kandang', function ($data) {
                    return $data->anak_kandang == null ? "-" : $data->anak_kandang->nama;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return view('pages.pengeluaran.index');
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
        $doc = Jadwal::where('jenis_jadwal',"DOC")->get();
        return view('pages.pengeluaran.create',[
            'jadwal' => $doc
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
        if(auth()->guard('anak_kandang')->check()) {
            $body['anak_kandang_id'] = auth()->guard('anak_kandang')->user()->id;
            $body['status'] = "MENUNGGU KONFIRMASI";
        } else {
            $body['status'] = "TERCATAT";
        }
        $user = Pengeluaran::create($body);
        if ($user) {
            return redirect()->route('pengeluaran.index');
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
        $data = Pengeluaran::find($id);
        return view('pages.pengeluaran.edit',[
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
        $data = Pengeluaran::find($id);

        $body = $request->all();
     
        $data->update($body);
        if ($data) {
            return redirect()->route('pengeluaran.index');
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
        $user = Pengeluaran::find($id);
        if($user) {
            $user->delete();
        }

        return response()->json(true);
    }

    public function approve($id)
    {
        $data = Pengeluaran::find($id);

     
        $data->update([
            'status' => 'TERCATAT'
        ]);
        if ($data) {
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['Gagal menyimpan data']);
        }
    }
}

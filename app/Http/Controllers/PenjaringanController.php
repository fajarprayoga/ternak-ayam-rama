<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
class PenjaringanController extends Controller
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
            $data = Jadwal::where('jenis_jadwal','PENJARINGAN')->select('*');

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    if($data->status == "MENUNGGU KONFIRMASI"){
                        if(auth()->guard()->user()->role == "OWNER") {
                            return "<a href='".route('jadwal.approve',$data->id)."' class='btn btn-info'><i class='fa fa-check'></i>Setujui</a>";
                        } else {
                            return "<a href='".route('jadwal-penjaringan.edit',$data->id)."' class='btn btn-warning'><i class='fa fa-edit'></i>Edit</a> <a href='#' data-id='" . $data->id . "' data-url='" . route('jadwal-penjaringan.destroy', $data->id) . "' class='delete-item btn btn-danger'><i class='fa fa-trash'></i>Hapus</a>";
                        }
                    } elseif($data->status == "DISETUJUI") {
                        return "<a href='".route('jadwal-penjaringan.edit',$data->id)."' class='btn btn-warning'><i class='fa fa-edit'></i>Edit</a>";

                    } else  {
                        return "";
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return view('pages.penjaringan.index');
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
        return view('pages.penjaringan.create',[
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
        $body['jenis_jadwal'] = "PENJARINGAN";
        $body['status'] = "MENUNGGU KONFIRMASI";

        $user = Jadwal::create($body);
        if ($user) {
            return redirect()->route('jadwal-penjaringan.index');
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
        $data = Jadwal::find($id);
        return view('pages.penjaringan.edit',[
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
        $data = Jadwal::find($id);

        $body = $request->all();

        $data->update($body);
        if ($data) {
            return redirect()->route('jadwal-penjaringan.index');
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
        $user = Jadwal::find($id);
        if($user) {
            $user->delete();
        }

        return response()->json(true);
    }
}

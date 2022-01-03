<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnakKandang;
use Auth;
class AnakKandangController extends Controller
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
            $data = AnakKandang::select('*');

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    return "<a href='".route('anak-kandang.edit',$data->id)."' class='btn btn-warning'><i class='fa fa-edit'></i>Edit</a> <a href='#' data-id='" . $data->id . "' data-url='" . route('anak-kandang.destroy', $data->id) . "' class='delete-item btn btn-danger'><i class='fa fa-trash'></i>Hapus</a>";
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return view('pages.anak_kandang.index');
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
        return view('pages.anak_kandang.create');
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
        $body['password'] = bcrypt($body['password']);

        $user = AnakKandang::create($body);
        if ($user) {
            return redirect()->route('anak-kandang.index');
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
        $data = AnakKandang::find($id);
        return view('pages.anak_kandang.edit',[
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
        $data = AnakKandang::find($id);

        $body = $request->all();
        $body['password'] = $body['password'] != null ? bcrypt($body['password']) : null;
        if ($body['password'] == null) {
            unset($body['password']);
        }

        $data->update($body);
        if ($data) {
            return redirect()->route('anak-kandang.index');
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
        $user = AnakKandang::find($id);
        if($user) {
            $user->delete();
        }

        return response()->json(true);
    }

    public function login()
    {
        return view('auth.login_anak_kandang');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
    
        if (Auth::guard('anak_kandang')->attempt(['email' => $request->email, 'password' => $request->password], false)) {
    
            return redirect()->intended('/subadmin');
        }
    }
}

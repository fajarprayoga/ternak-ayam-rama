@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Edit Obat</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Obat </a></li>
                <li class="breadcrumb-item active">Edit Obat</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        {{-- <div class="float-right d-none d-md-block">
            <div class="dropdown">
                <a href="/user/create" class="btn btn-primary"><i class="fa fa-plus"></i> Edit User</a>
            </div>
        </div> --}}
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{route('obat.update',$data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" required placeholder="Nama" value="{{$data->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="jenis" required id="" class="form-control">
                            <option {{ $data->tipe == "OBAT" ? "selected" : "" }} value="OBAT">Obat</option>
                            <option {{ $data->tipe == "VITAMIN" ? "selected" : "" }} value="VITAMIN">Vitamin</option>
                        </select>
                    </div>
                    <hr>
                    <a href="/obat" class="btn btn-secondary"><i class="ion ion-md-arrow-back"></i> Kembali</a>
                    <button class="btn btn-primary" type="submit"><i class="ion ion-md-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
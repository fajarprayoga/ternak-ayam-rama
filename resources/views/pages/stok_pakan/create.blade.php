@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Tambah Stok Pakan</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Stok Pakan </a></li>
                <li class="breadcrumb-item active">Tambah Stok Pakan</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        {{-- <div class="float-right d-none d-md-block">
            <div class="dropdown">
                <a href="/user/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>
            </div>
        </div> --}}
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{route('stok-pakan.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Tanggal Stok</label>
                        <input type="date" class="form-control" name="tgl_stok" data-date-format="yyyy-mm-dd" required placeholder="yyyy-mm-dd">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" min="1" required placeholder="Jumlah" >
                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="tipe" required id="" class="form-control">
                            <option value="IN">Stok Masuk</option>
                            <option value="OUT">Stok Keluar</option>
                        </select>
                    </div>
                    <hr>
                    <a href="/stok-pakan" class="btn btn-secondary"><i class="ion ion-md-arrow-back"></i> Kembali</a>
                    <button class="btn btn-primary" type="submit"><i class="ion ion-md-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Edit Jadwal Penjaringan</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Penjadwalan </a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Jadwal Penjaringan </a></li>
                <li class="breadcrumb-item active">Edit Jadwal Penjaringan</li>
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
                <form action="{{route('jadwal-penjaringan.update',$data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Tanggal Penjaringan</label>
                        <input type="date" class="form-control" name="tanggal" data-date-format="yyyy-mm-dd" value="{{$data->tanggal}}" required placeholder="yyyy-mm-dd">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Ayam (Ekor)</label>
                        <input type="number" class="form-control" name="jumlah_ayam" min="1" value="{{$data->jumlah_ayam}}"  required placeholder="Jumlah" >
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" name="harga" min="1" value="{{$data->harga}}"  required placeholder="Harga" >
                    </div>
                    <div class="form-group">
                        <label for="">Jadwal DOC</label>
                        <select name="jadwal_id" required id="" class="form-control">
                            <option disabled>Pilih Jadwal ..</option>
                            @foreach ($jadwal as $item)
                                <option {{$item->id == $data->jadwal_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->tanggal}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <a href="/jadwal-penjaringan" class="btn btn-secondary"><i class="ion ion-md-arrow-back"></i> Kembali</a>
                    <button class="btn btn-primary" type="submit"><i class="ion ion-md-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
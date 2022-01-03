@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Edit Pengeluaran</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengeluaran </a></li>
                <li class="breadcrumb-item active">Edit Pengeluaran</li>
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
                <form action="{{route('pengeluaran.update',$data->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Keperluan</label>
                        <input type="text" class="form-control" name="judul" required value="{{$data->judul}}">
                    </div>
                    <div class="form-group">
                        <label for="">Biaya</label>
                        <input type="number" class="form-control" name="jumlah" min="1" required placeholder="Jumlah"  value="{{$data->jumlah}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jadwal DOC</label>
                        <select name="jadwal_id" required id="" class="form-control">
                            <option selected disabled>Pilih Jadwal ..</option>
                            @foreach ($jadwal as $item)
                                <option {{$item->id == $data->jadwal_id ? 'selected' : ''}}  value="{{$item->id}}">{{$item->tanggal}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <a href="/pengeluaran" class="btn btn-secondary"><i class="ion ion-md-arrow-back"></i> Kembali</a>
                    <button class="btn btn-primary" type="submit"><i class="ion ion-md-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
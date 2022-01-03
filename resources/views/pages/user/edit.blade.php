@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Edit User</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">User </a></li>
                <li class="breadcrumb-item active">Edit User</li>
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
                <form action="{{route('user.update',$data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" required placeholder="Nama User" value="{{$data->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Email"  value="{{$data->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Password">
                        <small>Biarkan kosong bila tidak ingin mengganti</small>
                    </div>
                    <div class="form-group">
                        <label for="">Akses</label>
                        <select name="role" required id="" class="form-control">
                            <option {{ $data->role == "ADMIN" ? "selected" : "" }} value="ADMIN">Admin</option>
                            <option {{ $data->role == "OWNER" ? "selected" : "" }}  value="OWNER">Owner</option>
                        </select>
                    </div>
                    <hr>
                    <a href="/user" class="btn btn-secondary"><i class="ion ion-md-arrow-back"></i> Kembali</a>
                    <button class="btn btn-primary" type="submit"><i class="ion ion-md-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
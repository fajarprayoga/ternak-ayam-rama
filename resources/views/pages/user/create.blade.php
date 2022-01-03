@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Tambah User</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">User </a></li>
                <li class="breadcrumb-item active">Tambah User</li>
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
                <form action="/user" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" required placeholder="Nama User">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="">Akses</label>
                        <select name="role" required id="" class="form-control">
                            <option value="ADMIN">Admin</option>
                            <option value="OWNER">Owner</option>
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
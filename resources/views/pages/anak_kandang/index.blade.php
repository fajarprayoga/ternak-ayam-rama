@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Daftar Anak Kandang</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Anak Kandang </a></li>
                {{-- <li class="breadcrumb-item active">Blank</li> --}}
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
            <div class="dropdown">
                <a href="/anak-kandang/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Anak Kandang</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tangal Lahir</th>
                        <th>Alamat</th>
                        <th style="width:200px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>

    $('#datatable').DataTable({
        ajax: {
            url: "/anak-kandang?type=datatable",
            data: {
                as: "datatable"
            }
        },
        serverSide: true,
        processing: true,
        searching: false,
        columns: [
            {
                data: "nama"
            },

            {
                data: "email"
            },

            {
                data: "tanggal_lahir"
            },


            {
                data: "alamat"
            },
            {
                data: "action"
            }
        ],
    })

</script>
@endpush
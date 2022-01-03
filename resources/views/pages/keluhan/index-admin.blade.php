@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Daftar Keluhan</h4>
            <ol class="breadcrumb mb-0">
                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Panjadwalan </a></li> --}}
                <li class="breadcrumb-item active">Keluhan</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
            <div class="dropdown">
                <a href="/subadmin/keluhan/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Keluhan</a>
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
                        <th>Keluhan</th>
                        <th>Deskripsi</th>
                        <th>Pengaju</th>
                        <th>Tanggal</th>
                        <th>Kebutuhan</th>
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
            url: "/keluhan?type=datatable",
            data: {
                as: "datatable"
            }
        },
        serverSide: true,
        processing: true,
        searching: false,
        columns: [
            {
                data: "title"
            },

            {
                data: "keluhan"
            },
            {
                data: "anak_kandang"
            },
            {
                data: "created_at"
            },
            {
                data: "obat"
            }
        ],
    })

</script>
@endpush
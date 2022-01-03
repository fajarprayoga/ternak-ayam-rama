@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Daftar Stok Pakan</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Stok Pakan </a></li>
                {{-- <li class="breadcrumb-item active">Blank</li> --}}
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
            <div class="dropdown">
                <a href="/stok-pakan/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Stok Pakan</a>
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
                        <th>Tanggal Stok</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
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
            url: "/stok-pakan?type=datatable",
            data: {
                as: "datatable"
            }
        },
        serverSide: true,
        processing: true,
        searching: false,
        columns: [
            {
                data: "tgl_stok"
            },

            {
                data: "tipe"
            },

            {
                data: "jumlah"
            },
            {
                data: "action"
            }
        ],
    })

</script>
@endpush
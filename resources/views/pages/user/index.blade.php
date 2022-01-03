@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Daftar User</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">User </a></li>
                {{-- <li class="breadcrumb-item active">Blank</li> --}}
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
            <div class="dropdown">
                <a href="/user/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
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
            url: "/user?type=datatable",
            data: {
                as: "datatable"
            }
        },
        serverSide: true,
        processing: true,
        searching: false,
        columns: [
            {
                data: "name"
            },

            {
                data: "email"
            },

            {
                data: "role"
            },
            {
                data: "action"
            }
        ],
    })

</script>
@endpush
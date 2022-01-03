@extends('layouts.main')
@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Dashboard</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Selamat Datang, </a></li>
                {{-- <li class="breadcrumb-item active">Blank</li> --}}
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
            {{-- <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-settings mr-2"></i> Settings
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div> --}}
        </div>
    </div>
</div>   
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                  
                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Jadwal DOC Terdekat</h5>
                    <h4 class="fw-medium font-size-24">{{\App\Jadwal::where('jenis_jadwal','DOC')->count() > 0 ? \App\Jadwal::where('jenis_jadwal','DOC')->orderBy('tanggal','DESC')->first()->tanggal : "-"}} </h4>
                 
                </div>
                <div class="pt-2">
                   

                </div>
            </div>
        </div>
    </div> 
    
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                  
                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Jadwal Penjaringan Terdekat</h5>
                    <h4 class="fw-medium font-size-24">{{\App\Jadwal::where('jenis_jadwal','DOC')->count() > 0 ? \App\Jadwal::where('jenis_jadwal','PENJARINGAN')->orderBy('tanggal','DESC')->first()->tanggal : "-"}} </h4>
                 
                </div>
                <div class="pt-2">
                   

                </div>
            </div>
        </div>
    </div> 
    

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                  
                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Jadwal Panen Terdekat</h5>
                    <h4 class="fw-medium font-size-24">{{\App\Jadwal::where('jenis_jadwal','DOC')->count() > 0 ? \App\Jadwal::where('jenis_jadwal','PANEN')->orderBy('tanggal','DESC')->first()->tanggal : "-"}} </h4>
                 
                </div>
                <div class="pt-2">
                   

                </div>
            </div>
        </div>
    </div> 
    
</div> 
@endsection
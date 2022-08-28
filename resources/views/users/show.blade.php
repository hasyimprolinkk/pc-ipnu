@extends('layouts.app')

@section('title', 'Informasi User')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Informasi User</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Informasi User</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">
                    <img src="{{asset('uploads/avatars/'.$user->avatar)}}" style="width: 150px; height: 150px;" class="avatar-photo">
                </div>
                <h5 class="text-center h5 mb-0">{{$user->nama}}</h5>
                <div class="text-center">
                    <span class="badge badge-info badge-pill">{{$user->username}}</span>
                </div>
                <p class="text-center text-muted font-14">Terdaftar pada {{$user->created_at->isoFormat('D MMMM Y') }}</p>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Informasi User</h5>
                    <ul>
                        <li>
                            <span>Jenis Kelamin:</span>
                            {{$user->jk == 'L' ? 'Laki-Laki' : 'Perempuan'}}
                        </li>
                        @if ($user->roles == "admin" || $user->roles == "petugas")
                            <li>
                                <span>Jabatan:</span>
                                {{$user->jabatan}}
                            </li>
                        @endif
                        <li>
                            <span>Nomor HP:</span>
                            {{$user->no_hp}}
                        </li>
                        <li>
                            <span>Status:</span>
                            @if ($user->is_active == 1)
                                <div class="badge badge-primary">Aktif</div>        
                            @elseif ($user->is_active == 0)
                                <div class="badge badge-danger">Nonaktif</div>    
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="profile-skills">
                    <h5 class="mb-20 h5 text-blue">Informasi Lanjutan</h5>
                    <ul class="clearfix">
                        <div class="row clearfix progress-box">
                            
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                    <div class="card-box pd-30 height-100-p">
                                        <div class="progress-box text-center">
                                            <h5 class="text-light-blue padding-top-10 h5">Total Komentar</h5>
                                            <span class="d-block">{{$user->komentar->count()}}</i></span>
                                        </div>
                                    </div>
                                </div>
                            @if ($user->roles == 'admin' || $user->roles == 'petugas')
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                    <div class="card-box pd-30 height-100-p">
                                        <div class="progress-box text-center">
                                            <h5 class="text-light-blue padding-top-10 h5">Total Upload Kegiatan</h5>
                                            <span class="d-block">{{$user->kegiatan->count()}}</i></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </ul>
                </div>
                @if (Auth::user()->roles == 'admin') 
                <div class="profile-social">
                    <h5 class="mb-20 h5 text-blue">Action</h5>
                    <ul class="clearfix">
                        <form action="{{url("users/$user->id_user/status")}}" method="POST" class="float-left mr-1">
                            @csrf
                            @method('PUT')
                            <div class="btn-group">
                                <button type="button" class="btn btn-lg btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Ubah Status
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="submit" value="aktif" name="aktif">Aktif</button>
                                    <button class="dropdown-item" type="submit" value="nonaktif" name="nonaktif">Nonaktif</button>
                                </div>
                            </div>
                        </form>
                        <a href="#" data-toggle="modal" data-target="#confirmation-modal" class="btn btn-lg btn-danger">Hapus User</a>
                    </ul>
                </div>
                @endif
        </div>
    </div>
</div>

<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Data {{$user->roles == "user" ? "Laporan, " : ''}}Tanggapan dan Support dari {{$user->roles == "user" ? "user" : 'petugas'}} ini akan ikut terhapus. Anda yakin ingin menghapusnya?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        Tidak
                    </div>
                    <div class="col-6">
                        <button type="button" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                        Ya
                    </div>
                    <form id="delete-form" action="{{url("/users/$user->id_user/delete")}}" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
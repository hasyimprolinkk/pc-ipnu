@extends('layouts.main')

@section('title', 'Sistem Informasi Kegiatan PC IPNU Kraksaan')

@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Kegiatan PC IPNU</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kegiatan PC IPNU Kota Kraksaan</li>
                    </ol>
                </nav>
            </div>
            @auth
            @if(Auth::user()->roles == "admin" || Auth::user()->roles == "petugas")
                <div class="col-md-6 col-sm-12 text-right mt-2">
                    <a class="btn btn-primary" href="/kegiatan/add" role="button">Tambah Kegiatan</a>
                </div>
            @endif
            @endauth
        </div>
    </div>
    <div class="blog-wrap">
        <div class="container pd-0">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="blog-list">
                        <ul>
                            @if($kegiatan->count() == 0)
                                <li>
                                    <div class="chat-profile-header clearfix">
                                        <div class="left">
                                            <div class="clearfix text-center">
                                                <h4 class="text-danger"><i>Tidak ada data kegiatan</i></h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            
                            @foreach ($kegiatan as $l)    
                                <li>
                                    <div class="chat-profile-header clearfix">
                                        <div class="left">
                                            <div class="clearfix">
                                                <div class="chat-profile-photo">
                                                    <img src="{{asset('uploads/avatars/'.$l->user->avatar)}}"
                                                        alt="">
                                                </div>
                                                <div class="chat-profile-name">
                                                    <a href="/users/{{$l->user->id_user}}">
                                                        <h3>{{$l->user->nama}}</h3>
                                                    </a>
                                                    <span>{{$l->created_at->isoFormat('LLLL')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            @if ($l->gambar !== null)
                                                <div class="blog-img">
                                                    <img src="{{asset('uploads/kegiatan/'.$l->gambar)}}" alt="" class="bg_img">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="blog-caption">
                                                <div class="blog-by">
                                                    <b>{{$l->nama_kegiatan}}</b><br>
                                                    <span><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> {{ date('d F Y, H:i', strtotime($l->tanggal)) }} WIB</span><br>
                                                    <span><i class="icon-copy fa fa-map-marker" aria-hidden="true"></i> {{$l->lokasi}}</span>
                                                    <p>{{$l->keterangan}}</p>
                                                    <div class="pt-10">
                                                        <a href="/kegiatan/{{$l->id_kegiatan}}/komentar" class="btn btn-outline-primary">Selengkapnya...</a>
                                                    </div><hr>
                                                    <div class="position-static fixed-bottom">
                                                        <a href="/kegiatan/{{$l->id_kegiatan}}/komentar" class="card-link badge badge-light">
                                                            <span class=""><i class="icon-copy dw dw-chat-11"></i> {{ $l->komentar->count() }} Komentar</span>
                                                        </a>
                                                        <span class="badge badge-primary badge-pill">{{$l->kategori->kategori}}</span>
                                                        <span class="badge badge-success badge-pill">{{$l->kuota_peserta}} orang</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{$kegiatan->links('layouts.paginate')}}
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card-box">
                        <h5 class="pd-20 h5 mb-0">Jumlah Kegiatan</h5>
                        <div class="list-group">
                            <div class="list-group-item d-flex align-items-center justify-content-between">Semua
                                <span class="badge badge-primary badge-pill">{{$kegiatan->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
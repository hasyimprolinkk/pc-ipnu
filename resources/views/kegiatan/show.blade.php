@extends('layouts.app')

@section('title', 'Lihat Kegiatan')

@section('content')

<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Lihat Kegiatan</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/kegiatan">Data Kegiatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Kegiatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="profile-info">
            <h5 class="mb-20 h5 text-blue">Informasi Kegiatan</h5>
            <ul>
                <li>
                    <span>Tema Kegiatan:</span>
                    {{$kegiatan->nama_kegiatan}}
                </li>
                <li>
                    <span>Lokasi Kegiatan:</span>
                    {{$kegiatan->lokasi}}
                </li>
                <li>
                    <span>Tanggal Kegiatan:</span>
                    {{date('d F Y, H:i', strtotime($kegiatan->tanggal))}} WIB
                </li>
                <li>
                    <span>Kategori:</span>
                    {{$kegiatan->kategori->kategori}}
                </li>
                <li>
                    <span>Kuota Peserta:</span>
                    {{$kegiatan->kuota_peserta}} Orang
                </li>
                <li>
                    <span>Tanggal Input:</span>
                    {{$kegiatan->created_at->isoFormat('D MMMM Y, HH:m')}} WIB
                </li>
                <li>
                    <span>User Penginput:</span>
                    {{$kegiatan->user->nama}}
                </li>

                
            </ul>
        </div>
    </div>

    <div class="row mb-30">
        <div class="col-md-12 col-sm-12">
            <div class="blog-detail card-box overflow-hidden">
                
                @isset($kegiatan->gambar)
                    <div class="da-card box-shadow">
                        <div class="da-card-photo">
                            <img src="{{asset('uploads/kegiatan/'.$kegiatan->gambar)}}" alt="">
                            <div class="da-overlay">
                                <div class="da-social">
                                    <ul class="clearfix">
                                        <li><a href="{{asset('uploads/kegiatan/'.$kegiatan->gambar)}}" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                <div class="blog-caption">
                    <h4 class="mb-10">Keterangan</h4>
                    <p class="text-dark">{{$kegiatan->keterangan}}</p>
                </div>
                
            </div>
        </div>
    </div>
    <div class="card-box mb-30 p-2">
                <a href="/kegiatan/{{$kegiatan->id_kegiatan}}/print" class="btn btn-lg btn-info">Print</a>
                <a href="/kegiatan/{{$kegiatan->id_kegiatan}}/edit" class="btn btn-lg btn-primary">Edit</a>
                <a href="#" data-toggle="modal" data-target="#confirmation-modal" class="btn btn-lg btn-danger">Hapus</a>  
            <a href="/kegiatan/{{$kegiatan->id_kegiatan}}/komentar" class="btn btn-lg btn-secondary" target="_blank">Lihat Komentar</a>
    </div>
</div>

<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Data komentar daru kegiatan ini akan terhapus juga. Anda yakin ingin menghapusnya?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        Tidak
                    </div>
                    <div class="col-6">
                        <button type="button" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                        Ya
                    </div>
                    <form id="delete-form" action="/kegiatan/{{$kegiatan->id_kegiatan}}/delete" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
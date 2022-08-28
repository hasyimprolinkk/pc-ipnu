@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{asset('assets')}}/vendors/images/banner-img.png" alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Selamat Datang <div class="weight-600 font-30 text-blue">{{Auth::user()->nama}}!</div>
                </h4>
                <p class="font-18 max-width-600">Selamat Datang di Sistem Informasi Kegiatan PC IPNU Kota Kraksaan.</p>
            </div>
        </div>
    </div>
    <div class="row clearfix progress-box">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                    <h5 class="text-blue padding-top-10 h5">Jumlah Kegiatan</h5>
                    <h4 class="d-block">{{$kegiatan}}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                    <h5 class="text-light-orange padding-top-10 h5">Jumlah Petugas</h5>
                    <h4 class="d-block">{{$petugas}}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                    <h5 class="text-yellow padding-top-10 h5">Jumlah Anggota</h5>
                    <h4 class="d-block">{{$anggota}}</h4>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@extends('layouts.app')
@section('title', 'Kegiatan')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Kegiatan</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Kegiatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Gambar</label>
                <div class="custom-file">
                    <input type="file" name="gambar" class="custom-file-input @error('gambar') is-invalid @enderror">
                    <label class="custom-file-label">Pilih Gambar</label>
                </div>
                @error('gambar')
                    <div class="row mt-3">
                        <small class="col-sm-12 text-danger">{{$message}}</small>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tema Kegiatan*</label>
                <input type="text" name="nama_kegiatan" value="{{old('nama_kegiatan')}}" class="form-control  @error('nama_kegiatan') is-invalid @enderror" placeholder="Tema Kegiatan" autofocus required>
                @error('nama_kegiatan')
                    <div class="row mt-1">
                        <small class="col-sm-12 text-danger">{{$message}}</small>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Lokasi Kegiatan*</label>
                <input type="text" name="lokasi" value="{{old('lokasi')}}" class="form-control  @error('lokasi') is-invalid @enderror" placeholder="Lokasi Kegiatan" autofocus required>
                @error('lokasi')
                    <div class="row mt-1">
                        <small class="col-sm-12 text-danger">{{$message}}</small>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Kegiatan*</label>
                <input type="datetime-local" name="tanggal" value="{{old('tanggal')}}" class="form-control  @error('tanggal') is-invalid @enderror" placeholder="Tanggal Kegiatan" autofocus required>
                @error('tanggal')
                    <div class="row mt-1">
                        <small class="col-sm-12 text-danger">{{$message}}</small>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Keterangan*</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">{{old('keterangan')}}</textarea>
                @error('keterangan')
                    <div class="row mt-3">
                        <small class="col-sm-12 text-danger">{{$message}}</small>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Kuota Peserta Kegiatan*</label>
                <input type="number" name="kuota_peserta" value="{{old('kuota_peserta')}}" class="form-control  @error('kuota_peserta') is-invalid @enderror" placeholder="Kuota Peserta Kegiatan" autofocus required>
                @error('kuota_peserta')
                    <div class="row mt-1">
                        <small class="col-sm-12 text-danger">{{$message}}</small>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Kategori Kegiatan</label>
                <select name="kategori" class="form-control selectpicker @error('kategori') is-invalid @enderror" title="kategori" data-size="3">
                    @foreach ($kategori as $k)
                        @if(old('kategori') == $k->id_kategori)
                            <option value="{{$k->id_kategori}}" selected>{{$k->kategori}}</option>
                        @else
                            <option value="{{$k->id_kategori}}">{{$k->kategori}}</option>
                        @endif			
                    @endforeach
                </select>
                @error('kategori')
                    <div class="row mt-3">
                        <small class="col-sm-12 text-danger">{{$message}}</small>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection
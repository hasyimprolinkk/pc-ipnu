@extends('layouts.app')

@section('title', 'Semua Kegiatan')

@section('content')

    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Data Kegiatan</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Kegiatan</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            
                                {{request()->input('id_kategori') == "" ? "Kategori" : $kategori_ket->kategori}}
                            
                        </a> 
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/kegiatan">Semua</a>
                            @foreach ($kategori as $k)
                                <a class="dropdown-item" href="?id_kategori={{$k->id_kategori}}">{{$k->kategori}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Tabel Kegiatan PC IPNU</h4>
            </div>
            <div class="pb-20">
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No</th>
                            <th class="table-plus datatable-nosort">Gambar</th>
                            <th class="table-plus datatable-nosort">Tema Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Kuota Peserta</th>
                            <th>Kategori</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan->get() as $k)
                            <tr>
                                <td class="table-plus">{{$loop->iteration}}</td>

                                <td class="table-plus">
                                    @if($k->gambar)
                                        <img style="width:30%;" src="{{asset('uploads/kegiatan/'.$k->gambar)}}" alt="">
                                    @else
                                        <span class="text-warning">Tidak ada Gambar</span>
                                    @endif
                                </td>
                                <td class="table-plus">{{$k->nama_kegiatan}}</td>
                                <td class="table-plus">{{$k->lokasi}}</td>
                                <td class="table-plus">{{$k->keterangan}}</td>

                                <td>{{date('d F Y, H:i', strtotime($k->tanggal))}} WIB</td>

                                <td>
                                    <span class="badge badge-warning">{{$k->kuota_peserta}} orang</span>
                                </td>

                                <td>{{$k->kategori->kategori }}</td>

                                <td>
                                    <a class="btn btn-info btn-sm" href="/kegiatan/{{$k->id_kegiatan}}/show"><i class="dw dw-eye"></i> Lihat</a>
                                    <a class="btn btn-primary btn-sm" href="/kegiatan/{{$k->id_kegiatan}}/edit"><i class="dw dw-edit"></i> Edit</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#confirmation-modal_{{$k->id_kegiatan}}" class="btn btn-lg btn-danger"><i class="dw dw-delete-3"></i> Hapus</a>
                                </td>
                            </tr>
                            <div class="modal fade" id="confirmation-modal_{{$k->id_kegiatan}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-center font-18">
                                            <h4 class="padding-top-30 mb-30 weight-500">Data Komentar dari kegiatan ini akan terhapus juga. Anda yakin ingin menghapusnya?</h4>
                                            <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                    Tidak
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" onclick="event.preventDefault(); document.getElementById('delete-form_{{$k->id_kegiatan}}').submit();" class="btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                                                    Ya
                                                </div>
                                                <form id="delete-form_{{$k->id_kegiatan}}" action="/kegiatan/{{$k->id_kegiatan}}/delete" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

@endsection
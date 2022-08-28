@extends('layouts.main')

@section('title', 'Komentar')

@section('content')

    <div class="min-height-200px">
        <div class="container">
        <div class="row justify-content-center mb-30">
            <div class="col-md-12 col-sm-12 col-lg-8">
                <div class="blog-detail card-box overflow-hidden">
                    <div class="chat-profile-header clearfix">
                        <div class="left">
                            <div class="clearfix">
                                <div class="chat-profile-photo">
                                    <img src="{{asset('uploads/avatars/'.$kegiatan->user->avatar)}}"
                                        alt="">
                                </div>
                                <div class="chat-profile-name">
                                    <a href="/users/{{$kegiatan->user->id_user}}"><h3>{{$kegiatan->user->nama}}</h3></a>
                                    <span>{{ $kegiatan->created_at->isoFormat('LLLL') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($kegiatan->gambar !== null)
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
                    @endif


                    <div class="blog-caption">
                        <b>{{$kegiatan->nama_kegiatan}}</b><br>
                        <span><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> {{ date('d F Y, H:i', strtotime($kegiatan->tanggal)) }} WIB</span><br>
                        <span><i class="icon-copy fa fa-map-marker" aria-hidden="true"></i> {{$kegiatan->lokasi}}</span>                                
                        <h4 class="mb-10">Keterangan</h4>
                        <p class="text-dark">{{$kegiatan->keterangan}}</p>
                        <p class="text-dark mb-15">Kategori Laporan : <span class="text-primary">{{$kegiatan->kategori->kategori}}</span></p>
                        <div class="position-static fixed-bottom">
                            <a href="" class="card-link badge badge-light">
                                <span class=""><i class="icon-copy dw dw-chat-11"></i> {{$kegiatan->komentar->count()}} Komentar</span>
                            </a>
                            <span class="badge badge-primary badge-pill">{{$kegiatan->kategori->kategori}}</span>
                            <span class="badge badge-success badge-pill">{{$kegiatan->kuota_peserta}} orang</span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
        <div class="container mb-30">
            <div class="row justify-content-center">
                <div class="card-box col-md-12 col-sm-12 col-lg-8">
                    <div class="chat-box">
                        <div class="chat-desc">
                            <ul style="margin-bottom: 30px;">
                                @foreach ($kegiatan->komentar as $k)
                                    <li class="clearfix" style="margin-bottom: 3px;">
                                        <span class="chat-img">
                                            <img src="{{asset('uploads/avatars/'.$k->user->avatar)}}" alt="">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="chat-profile-name">
                                                <a href="/users/{{$k->user->id_user}}"><small>{{$k->user->nama}}
                                                    @if($k->user->roles =="admin" || $k->user->roles == "petugas")
                                                        <span class="text-primary">({{$k->user->roles}})</span>
                                                    @endif
                                                </small></a>
                                            </div>
                                            <p>{{$k->komentar}}</p>
                                            <div class="chat_time">{{$k->created_at->diffForHumans()}}
                                                @auth
                                                @if (Auth::user()->id_user == $k->user->id_user)
                                                    <a href="#" data-toggle="modal" data-target="#confirmation-modal_{{$k->id_komentar}}" class="ml-2 text-danger"><i class="icon-copy dw dw-delete-3"></i> hapus</a>
                                                    <div class="modal fade" id="confirmation-modal_{{$k->id_komentar}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center font-18">
                                                                    <h4 class="padding-top-30 mb-30 weight-500">Hapus Komentar?</h4>
                                                                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                                        <div class="col-6">
                                                                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                                            Tidak
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <button type="button" onclick="event.preventDefault(); document.getElementById('delete-form_{{$k->id_komentar}}').submit();" class="btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                                                                            Ya
                                                                        </div>
                                                                        <form id="delete-form_{{$k->id_komentar}}" action="{{url('komentar/'. $k->id_komentar . '/delete')}}" method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @endauth
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                            <div class="chat-footer mt-30">
                                <form action="/komentar" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_kegiatan" value="{{$kegiatan->id_kegiatan}}">
                                    <div class="chat_text_area">
                                        <textarea name="komentar" placeholder="Masukkan Komentar…"></textarea>
                                    </div>
                                    <div class="chat_send">
                                        <button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
                                    </div>
                                </form>
                                @error('komentar')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection
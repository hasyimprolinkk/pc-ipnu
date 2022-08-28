@extends('layouts.app')

@section('title', 'Data User')

@section('content')

    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Data User</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data User</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="/users/add" role="button">
                        Tambah User
                    </a>
                </div>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Tabel User</h4>
            </div>
            <div class="pb-20">
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="table-plus datatable-nosort">Nama</th>
                            <th class="table-plus datatable-nosort">Jabatan</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @if($user->id_user != '1')
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->jabatan}}</td>
                                @if ($user->is_active == 1)
                                    <td><span class="badge badge-primary">Aktif</span></td>
                                @elseif ($user->is_active == 0)
                                    <td><span class="badge badge-danger">Nonaktif</span></td>
                                @endif
                                <td><span class="badge badge-success">{{$user->roles}}</span></td>
                                <td>
                                    <a class="mr-3" href="/users/{{$user->id_user}}"><i class="dw dw-eye"></i></a>
                                    <a class="" href="#" data-toggle="modal" data-target="#confirmation-modal_{{$user->id_user}}" class="btn btn-lg btn-danger"><i class="dw dw-delete-3"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="confirmation-modal_{{$user->id_user}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-center font-18">
                                            <h4 class="padding-top-30 mb-30 weight-500">Semua data yang berkaitan dengan user ini akan terhapus. Anda yakin ingin menghapusnya?</h4>
                                            <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                    Tidak
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" onclick="event.preventDefault(); document.getElementById('delete-form_{{$user->id_user}}').submit();" class="btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                                                    Ya
                                                </div>
                                                <form id="delete-form_{{$user->id_user}}" action="{{url("users/$user->id_user/delete")}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
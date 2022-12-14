@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="row align-items-center mb-30">
    <div class="col-lg">
        <div class="register-edited bg-white box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-primary">Edit Kategori</h2>
            </div>
            <form method="POST" action="/kategori/{{$kategori->id_kategori}}/edit">
                @csrf
                @method('PUT')
                    <div class="form-wrap max-width-600 mx-auto">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">kategori*</label>
                            <div class="col-sm-8">
                                <input type="text" name="kategori" value="{{$kategori->kategori}}" class="form-control  @error('kategori') is-invalid @enderror">
                                @error('kategori')
                                    <div class="row mt-1">
                                        <small class="col-sm-12 text-danger">{{$message}}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Edit') }}</button>
                                </div>		
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
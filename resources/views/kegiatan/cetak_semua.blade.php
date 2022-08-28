<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Kegiatan PC IPNU</title>
    <style>
        .page_break { page-break-before: always; }

        @page{
            margin: 2.5cm 2.5cm 2.5cm 2.5cm;
        }

        .table-bordered {
            border: 1px solid black;
        }

        th{
            text-align: left;
        }

        .table, .bordir {
            border: 1px solid black;
            border-collapse: collapse;
        }
    
        hr.solid {
        border-top: 2px solid #000000;
        }

        #data{
            width: 100%;
        }
      </style>
    </head>

<body>

    <table>
        <tr>
            <td><img src="{{public_path('assets\vendors\images\logo.png')}}" width="80px" class="mr-3" alt=""></td>
            <td>
                <div style="text-align: center;">
                    <h1 style="margin-bottom: -15px;">Sistem Informasi Kegiatan PC IPNU Kota Kraksaan</h1>
                    <h4>Kec. Kraksaan, Kabupaten Probolinggo, Jawa Timur 67282</h5>
                </div>
            </td>
        </tr>
    </table>
        <hr class="solid">
        <div>
            <h4>Detail Kegiatan</h4>
            <h4>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h4>
        </div>
        <hr class="solid">
        <div>
            <table  cellpadding="5">
                <tr>
                    <td>Tanggal Input Kegiatan</td>
                    <td>: {{date('d F Y',strtotime($from_date))}} s/d {{date('d F Y',strtotime($to_date))}}</td>
                </tr>
                <tr>
                    <td>Total Kegiatan</td>
                    <td>: {{$kegiatan->count()}} Kegiatan</td>
                </tr>
            </table>
        </div>

        {{-- <hr class="solid"> --}}
        @foreach ($kegiatan as $k)
        <div class="page_break">
            <table>
                <tr>
                    <td><img src="{{public_path('assets\vendors\images\logo.png')}}" width="80px" class="mr-3" alt=""></td>
                    <td>
                        <div style="text-align: center;">
                            <h1 style="margin-bottom: -15px;">Sistem Informasi Kegiatan PC IPNU Kota Kraksaan</h1>
                            <h4>Kec. Kraksaan, Kabupaten Probolinggo, Jawa Timur 67282</h5>
                        </div>
                    </td>
                </tr>
            </table>
            <hr class="solid">
            <div>
                <h4 style="margin-top: 4px; margin-bottom: -15px;">Detail Kegiatan</h4>
                <h4>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h4>
            </div>
            <hr class="solid">
            <br>
            <div style="margin-top: 3px; margin-bottom: 3px;">
                <table id="data">
                    <tr>
                        <td>Tema Kegiatan</td>
                        <td class="">: {{ $k->nama_kegiatan }}</td>
                        @isset($k->gambar)
                            <td rowspan="5" align="center">
                                <img src="{{ public_path('uploads/kegiatan/'.$k->gambar) }}" width="150px" alt="">
                            </td>
                        @endisset
                    </tr>
                    <tr>
                        <td>User Penginput</td>
                        <td>: {{ $k->user->nama }}</td>
                    </tr>
                    <tr>
                        <td class="mr-3">Tanggal Kegiatan</td>
                        <td>: {{ date('d F Y, H:i', strtotime($k->tanggal)) }} WIB</td>
                    </tr>
                    <tr>
                        <td class="mr-3">Lokasi</td>
                        <td>: {{ $k->lokasi }}</td>
                    </tr>
                </table>
            </div>
            <br>
            <table style="width: 100%;" cellpadding="5" class="table">
                    <tr>
                        <th class="bordir" style="text-align: left; width: 60%;" scope="col">Keterangan</th>
                        <th class="bordir" style="text-align: left; width: 20%;">Kategori</th>
                        <th class="bordir" style="text-align: left; width: 20%;">Kuota Peserta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bordir">{{ $k->keterangan }}</td>
                        <td class="bordir">{{ $k->kategori->kategori }}</td>
                        <td class="bordir">{{ $k->kuota_peserta }} orang</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PC IPNU | Sistem Informasi Kegiatan PC IPNU Kota Kraksaan</title>
    <style>
        @page{
            margin: 2.5cm 2.5cm 2.5cm 2.5cm;
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
            <h4 style="margin-top: 4px; margin-bottom: -15px;">Detail Kegiatan</h4>
            <h4>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h4>
        </div>
        <hr class="solid">
        <br>
        <div style="margin-top: 3px; margin-bottom: 3px;">
            <table id="data">
                <tr>
                    <td>Tema Kegiatan</td>
                    <td class="">: {{ $kegiatan->nama_kegiatan }}</td>
                    @empty($kegiatan->gambar)
                        <td rowspan="5" align="center">
                            <img src="{{ base64_decode($kegiatan->gambar) }}" width="150px" alt="">
                        </td>
                    @endempty
                </tr>
                <tr>
                    <td>User Penginput</td>
                    <td>: {{ $kegiatan->user->nama }}</td>
                </tr>
                <tr>
                    <td class="mr-3">Tanggal Kegiatan</td>
                    <td>: {{ date('d F Y, H:i', strtotime($kegiatan->tanggal)) }} WIB</td>
                </tr>
                <tr>
                    <td class="mr-3">Lokasi</td>
                    <td>: {{ $kegiatan->lokasi }}</td>
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
                    <td class="bordir">{{ $kegiatan->keterangan }}</td>
                    <td class="bordir">{{ $kegiatan->kategori->kategori }}</td>
                    <td class="bordir">{{ $kegiatan->kuota_peserta }} orang</td>
                </tr>
            </tbody>
        </table>

</body>

</html>
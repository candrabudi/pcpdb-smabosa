<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{$nama_siswa ?? ''}}</title>
    <style>
        table,
        th,
        td {
            border-collapse: collapse;
        }

        .header {
            width: 100%;
            height: 120px;
        }

        .clear {
            clear: both;
        }

        .header .logo {
            width: 15%;
            box-sizing: border-box;
            float: left;
            height: 110px;
        }

        .header .logo img {
            width: 95%;
            display: block;
            margin: 5px auto;
        }

        .header .head-text {
            width: 50%;
            float: left;
        }

        .header .head-text .text-1 h1 {
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        .header .head-text .text-2 h1 {
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        .header .number-head {
            width: 34%;
            float: left;
            font-size: 12px;
            height: 110px;
            box-sizing: border-box;
        }

        .header .number-head td,
        th {
            padding: 2.5px;
            margin-top: 8px;
            display: inline-block;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
        }

        .header-register {
            width: 100%;
            min-height: 150px;
        }

        .header-register .box-1 {
            width: 70%;
            float: left;
        }

        .header-register .box-1 h1 {
            font-size: 16px;
            margin-top: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            margin-bottom: 10px;

        }

        .header-register .box-1 p {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;

        }

        .box-2 {
            width: 30%;
            float: left;
            font-size: 16px;
        }

        .box-2 h1 {
            text-align: center;
            font-size: 16px;
        }

        .box-2 img {
            width: 60%;
            margin-top: 20px;
        }

        .biodata {
            width: 100%;
            min-height: 200px;
        }

        .biodata h1 {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            text-align: left;
        }

        .biodata h2 {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        .biodata .box-biodata {
            width: 100%;
            height: 50px;
            display: block;
            margin-bottom: -10px;
        }

        .biodata .left {
            width: 30%;
            float: left;
            height: 30px;
        }

        .biodata .left h2 {
            margin-left: 20px;
            margin-top: 10px;
        }

        .biodata .right h2 {
            margin-top: 10px;
        }

        .biodata .right {
            width: 70%;
            float: left;
            height: 30px;
        }


        /* DATA SEKOLAH */
        .school-container {
            width: 100%;
            min-height: 200px;
            margin-top: 30px;
        }

        .school-container h1 {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        .school-container h2 {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        .school-container .box-school {
            width: 100%;
            height: 50px;
            display: block;
            margin-bottom: -10px;
        }

        .box-school table {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        .school-container .left {
            width: 30%;
            float: left;
            height: 30px;
        }

        .school-container .left h2 {
            margin-left: 20px;
            margin-top: 10px;
        }

        .school-container .right h2 {
            margin-top: 10px;
        }

        .school-container .right {
            width: 70%;
            float: left;
            height: 30px;
        }

        .school-container .box-left {
            width: 50%;
            min-height: 50px;
            float: left;
            font-size: 10px;
        }

        .school-container .box-right {
            width: 50%;
            float: right;
            min-height: 50px;
            font-size: 12px;
        }

        .jumlah-presensi {
            position: absolute;
            margin-top: 180px;
            margin-left: -50px;
        }

        .page-break {
            page-break-after: always;
        }

        .biodata h3 {
            font-size: 16px;
            font-weight: bold;
        }

        .signature {
            width: 100%;
            min-height: 50px;
        }

        .signature .left {
            width: 50%;
            float: left;
            font-size: 14px;
            min-height: 50px;
        }

        .signature .right {
            width: 50%;
            float: left;
            font-size: 14px;
            min-height: 50px;
        }

        .signature h2 {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo border">
            <img src="https://yt3.ggpht.com/ytc/AMLnZu9hzIz9yT5ReA7X4MBAL1RYxhXrhO1t84_JijHZxg=s900-c-k-c0x00ffffff-no-rj" alt="">
        </div>
        <div class="head-text border">
            <div class="text-1">
                <h1 class="mt-3" style="text-align: center;">SMA BOPKRI 1 YOGYAKARTA</h1>
            </div>
            <hr>
            <div class="text-2">
                <h1 style="font-size: 14px; text-align: center;">FORMULIR PENDAFTARAN PCPDB TAHUN PELAJARAN {{$tahun_sekolah->name}}</h1>
            </div>
        </div>
        <div class="number-head border">
            <table width="100%">
                <tr>
                    <th>NO. DOKUMEN</th>
                    <td>: FM. SMABOSA/SIS-</td>
                </tr>
                <tr>
                    <th>NO. REVISI</th>
                    <td>: 00</td>
                </tr>
                <tr>
                    <th>TGL. TERBIT</th>
                    <td>: {{tanggal_indonesia(\Carbon\Carbon::now()->format('Y-m-d H:i:s'))}}</td>
                </tr>
                <tr>
                    <th>HALAMAN</th>
                    <td>: 1 dari 3</td>
                </tr>
            </table>
        </div>
    </header>

    <section class="header-register">
        <div class="box-1">
            <h1>NO PENDAFTARAN : {{ $siswa->registration_number != null ? $siswa->registration_number : $siswa->registration_number_offline }}</h1>
            <p>Mohon ditulis dengan lengkap dan benar menggunakan huruf cetak, Berilah tanda lingkaran pada pilihan jawaban sesuai keadaan.</p>
        </div>
        <div class="box-2">
            @if($siswa_dokumen->pas_photo)
            <h1><img src="{{public_path('storage/'.$siswa_dokumen->pas_photo)}}" style="width: 100px;"></h1>
            @else
            <h1><img src="" style="width: 100px;"></h1>
            @endif
        </div>
    </section>
    <div class="clear"></div>
    <section class="biodata">
        <h1>A. DATA CALON PESERTA DIDIK</h1>
        <div class="box-biodata" style="margin-top: 30px;">
            <div class="left">
                <h2>1. Nama Lengkap</h2>
            </div>
            <div class="right">
                <h2>: {{$nama_siswa ?? ''}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left">
                <h2>2. NISN (sesuai ijasah SD)</h2>
            </div>
            <div class="right">
                <h2>: {{$siswa->nisn ?? ''}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left">
                <h2>3. Jenis Kelamin *)</h2>
            </div>
            <div class="right">
                <h2>: {{$siswa->gender ?? ''}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left">
                <h2>4. Tempat, Tgl Lahir</h2>
            </div>
            <div class="right">
                <h2>: {{$siswa->birth_place ?? ''}}, {{tanggal_indonesia($siswa->birth_date)}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left">
                <h2>5. Agama</h2>
            </div>
            <div class="right">
                <h2>: {{$siswa->religion}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left">
                <h2>6. Alamat</h2>
            </div>
            <div class="right">
                <h2>: {{$siswa->address}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left">
                <h2>7. Email</h2>
            </div>
            <div class="right">
                <h2>: {{$email_siswa}}</h2>
            </div>
        </div>
    </section>

    <section class="school-container">
        <h1>B. ASAL SEKOLAH CALON PESERTA DIDIK :</h1>
        <div class="box-school" style="margin-top: 30px;">
            <div class="left">
                <h2>1. Nama Sekolah Asal</h2>
            </div>
            <div class="right">
                <h2>: {{$sekolah->school_name}}</h2>
            </div>
        </div>
        <div class="box-school">
            <div class="left">
                <h2>2. Alamat Sekolah Asal</h2>
            </div>
            <div class="right">
                <h2>: {{$sekolah->school_address}}</h2>
            </div>
        </div>
        <div class="box-school">
            <div class="left">
                <h2>3. No. Telepon SMP</h2>
            </div>
            <div class="right">
                <h2>: {{$sekolah->school_phone}}</h2>
            </div>
        </div>
        <div class="box-school">
            <div class="left">
                <h2>4. Rapor SMP</h2>
            </div>
            <div class="right">
                <div class="box-left">
                    <table width="80%" class="table">
                        <tbody>
                            <tr>
                                <td colspan="3" style="text-align: center">Nilai Siswa</td>
                            </tr>
                            <tr>
                                <td width="50">KELAS</td>
                                <td width="50">SEM</td>
                                <td width="50">NILAI</td>
                            </tr>
                            @php
                            $nilai_siswa = array(
                            [
                            'kelas' => 'VII',
                            'semester_satu' => $nilai_kelas_tujuh->first_semester ?? 0,
                            'semester_dua' => $nilai_kelas_tujuh->second_semester ?? 0,
                            ],[
                            'kelas' => 'VIII',
                            'semester_satu' => $nilai_kelas_delapan->first_semester ?? 0,
                            'semester_dua' => $nilai_kelas_delapan->second_semester ?? 0,
                            ],[
                            'kelas' => 'IX',
                            'semester_satu' => $nilai_kelas_sembilan->first_semester ?? 0,
                            'semester_dua' => $nilai_kelas_sembilan->second_semester ?? 0,
                            ]
                            );
                            $rata_rata = 0;
                            @endphp
                            @foreach ($nilai_siswa as $grade)
                            <tr>
                                <td width="10" rowspan="2">{{ $grade['kelas'] }}</td>
                                <td width="20">Sem 1</td>
                                <td width="50">{{ $grade['semester_satu'] }}</td>
                            </tr>
                            <tr>
                                <td width="20">Sem 2</td>
                                <td width="50">{{ $grade['semester_dua'] }}</td>
                            </tr>
                            @php
                            $rata_rata += $grade['semester_satu']+$grade['semester_dua'];
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="2">Rata rata</td>
                                <td>
                                    @if($nilai_kelas_tujuh && $nilai_kelas_delapan && $nilai_kelas_sembilan)
                                        {{round($rata_rata/6, 2)}}
                                    @else
                                        {{round($rata_rata/4, 2)}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-right">
                    <table>
                        <tr>
                            <td colspan="3" style="text-align: center">Presensi</td>
                        </tr>
                        <tr>
                            <td width="50">S</td>
                            <td width="50">I</td>
                            <td width="50">A</td>
                        </tr>
                        <tr>
                            <td>{{$absen_tujuh->sick_one ?? 0}}</td>
                            <td>{{$absen_tujuh->permission_one ?? 0}}</td>
                            <td>{{$absen_tujuh->alpa_one ?? 0}}</td>
                        </tr>
                        <tr>
                            <td>{{$absen_tujuh->sick_two ?? 0}}</td>
                            <td>{{$absen_tujuh->permission_two ?? 0}}</td>
                            <td>{{$absen_tujuh->alpa_two ?? 0}}</td>
                        </tr>
                        <tr>
                            <td>{{$absen_delapan->sick_one ?? 0}}</td>
                            <td>{{$absen_delapan->permission_one ?? 0}}</td>
                            <td>{{$absen_delapan->alpa_one ?? 0}}</td>
                        </tr>
                        <tr>
                            <td>{{$absen_delapan->sick_two ?? 0}}</td>
                            <td>{{$absen_delapan->permission_two ?? 0}}</td>
                            <td>{{$absen_delapan->alpa_two ?? 0}}</td>
                        </tr>
                        <tr>
                            <td>{{$absen_sembilan->sick_one ?? 0}}</td>
                            <td>{{$absen_sembilan->permission_one ?? 0}}</td>
                            <td>{{$absen_sembilan->alpa_one ?? 0}}</td>
                        </tr>
                        <tr>
                            <td>{{$absen_sembilan->sick_two ?? 0}}</td>
                            <td>{{$absen_sembilan->permission_two ?? 0}}</td>
                            <td>{{$absen_sembilan->alpa_two ?? 0}}</td>
                        </tr>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>

    <div class="page-break"></div>

    <header class="header">
        <div class="logo border">
            <img src="https://yt3.ggpht.com/ytc/AMLnZu9hzIz9yT5ReA7X4MBAL1RYxhXrhO1t84_JijHZxg=s900-c-k-c0x00ffffff-no-rj" alt="">
        </div>
        <div class="head-text border">
            <div class="text-1">
                <h1 class="mt-3" style="text-align: center;">SMA BOPKRI 1 YOGYAKARTA</h1>
            </div>
            <hr>
            <div class="text-2">
                <h1 style="font-size: 14px; text-align: center;">FORMULIR PENDAFTARAN PCPDB TAHUN PELAJARAN {{$tahun_sekolah->name}}</h1>
            </div>
        </div>
        <div class="number-head border">
            <table width="100%">
                <tr>
                    <th>NO. DOKUMEN</th>
                    <td>: FM. SMABOSA/SIS-</td>
                </tr>
                <tr>
                    <th>NO. REVISI</th>
                    <td>: 00</td>
                </tr>
                <tr>
                    <th>TGL. TERBIT</th>
                    <td>: {{tanggal_indonesia(\Carbon\Carbon::now()->format('Y-m-d H:i:s'))}}</td>
                </tr>
                <tr>
                    <th>HALAMAN</th>
                    <td>: 2 dari 3</td>
                </tr>
            </table>
        </div>
    </header>

    <section class="biodata">
        <h1>C. DATA ORANG TUA / WALI CALON PESERTA DIDIK</h1>
        <div style="margin-top: 30px"></div>
        @if($wali)
            <h3 style="margin-left: 15px;marign-top: 40px;display:block;">1. Wali</h3>
            <div class="box-biodata" style="margin-top: 10px; margin-left: 20px;">
                <div class="left">
                    <h2 style="font-size: 12px;">a. Nama Lengkap</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$wali->parent_name}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">b. Tempat /Tgl. Lahir</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$wali->birth_place}}, {{tanggal_indonesia($wali->birth_date)}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">c. Agama</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$wali->religion}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">d. Pendidikan *)</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$wali->education}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">e. Pekerjaan</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$wali->profession}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">f. Penghasilan / bulan</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$wali->income}}</h2>
                </div>
            </div>
        @else
            <h3 style="margin-left: 15px;marign-top: 40px;display:block;">1. Ayah</h3>
            <div class="box-biodata" style="margin-top: 10px; margin-left: 20px;">
                <div class="left">
                    <h2 style="font-size: 12px;">a. Nama Lengkap</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ayah->parent_name}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">b. Tempat /Tgl. Lahir</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ayah->birth_place}}, {{tanggal_indonesia($ayah->birth_date)}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">c. Agama</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ayah->religion}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">d. Pendidikan *)</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ayah->education}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">e. Pekerjaan</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ayah->profession}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">f. Penghasilan / bulan</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ayah->income}}</h2>
                </div>
            </div>

            <h3 style="margin-left: 15px;">2. Ibu</h3>
            <div class="box-biodata" style="margin-top: 10px; margin-left: 20px;">
                <div class="left">
                    <h2 style="font-size: 12px;">a. Nama Lengkap</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ibu->parent_name}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">b. Tempat /Tgl. Lahir</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">{{$ibu->birth_place}}, {{tanggal_indonesia($ibu->birth_date)}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">c. Agama</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ibu->religion}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">d. Pendidikan *)</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ibu->education}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">e. Pekerjaan</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ibu->profession}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">f. Penghasilan / bulan</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$ibu->income}}</h2>
                </div>
            </div>
            <div class="box-biodata" style="margin-left: 20px;margin-top: -10px;top: -30px;">
                <div class="left">
                    <h2 style="font-size: 12px;">g. Alamat lengkap orang tua</h2>
                </div>
                <div class="right">
                    <h2 style="font-size: 12px;">: {{$siswa_detail->parent_address ?? ''}}</h2>
                </div>
            </div>
        @endif
    </section>

    <section class="biodata">
    <h1>D. DATA CALON PESERTA DIDIK</h1>
        <div class="box-biodata" style="margin-top: 10px;">
            <div class="left" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">1. No. Telp. Rumah</h2>
            </div>
            <div class="right" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">: {{$siswa_detail->phone_house ?? ''}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">2. No. HP Calon Peserta Didik</h2>
            </div>
            <div class="right" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">: {{$siswa->phone_number ?? ''}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">3. No. WA Calon Peserta Didik</h2>
            </div>
            <div class="right" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">: {{$siswa->whatsapp_phone ?? ''}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">4. No.Telp/HP Ayah</h2>
            </div>
            <div class="right" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">: {{$ayah->whatsapp_phone ?? ''}}</h2>
            </div>
        </div>
        <div class="box-biodata">
            <div class="left" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">5. No.Telp/HP Ibu</h2>
            </div>
            <div class="right" style="font-size: 14px;">
                <h2 style="font-size: 12px;margin-margin-bottom: -20px;">: {{$ibu->whatsapp_phone ?? ''}}</h2>
            </div>
        </div>
    </section>

    <div class="page-break"></div>
    <header class="header">
        <div class="logo border">
            <img src="https://yt3.ggpht.com/ytc/AMLnZu9hzIz9yT5ReA7X4MBAL1RYxhXrhO1t84_JijHZxg=s900-c-k-c0x00ffffff-no-rj" alt="">
        </div>
        <div class="head-text border">
            <div class="text-1">
                <h1 class="mt-3" style="text-align: center;">SMA BOPKRI 1 YOGYAKARTA</h1>
            </div>
            <hr>
            <div class="text-2">
                <h1 style="font-size: 14px; text-align: center;">FORMULIR PENDAFTARAN PCPDB TAHUN PELAJARAN {{$tahun_sekolah->name}}</h1>
            </div>
        </div>
        <div class="number-head border">
            <table width="100%">
                <tr>
                    <th>NO. DOKUMEN</th>
                    <td>: FM. SMABOSA/SIS-</td>
                </tr>
                <tr>
                    <th>NO. REVISI</th>
                    <td>: 00</td>
                </tr>
                <tr>
                    <th>TGL. TERBIT</th>
                    <td>: {{tanggal_indonesia(\Carbon\Carbon::now()->format('Y-m-d H:i:s'))}}</td>
                </tr>
                <tr>
                    <th>HALAMAN</th>
                    <td>: 2 dari 3</td>
                </tr>
            </table>
        </div>
    </header>
    <footer style="margin-top: 200px;">
        <div class="signature">
            <div class="left">
                <h2>Orang Tua/Wali Calon Peserta Didik</h2>
                <hr>
            </div>
            <div class="right">
                <h2>Yogyakarta,…………………………………….</h2>
                <h2>Calon Peserta Didik</h2>
                <hr>
            </div>
        </div>
    </footer>
</body>

</html>
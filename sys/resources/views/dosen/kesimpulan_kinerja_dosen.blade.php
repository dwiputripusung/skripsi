<html>

<head>
    <title>Cetak Kesimpulan Kinerja Dosen</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        .text-red{
            color: red;
    }
    </style>
</head>

<body>
    <!-- <body onLoad="window.print();"> -->
    <div class="page-landscape">

        <div class="nobreak">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="table-header">
                <tbody>
                    <tr>
                        <td width="120px" rowspan="6" align="center"><img src="{{ asset('assets/logounima.png') }}"
                                width="100px"></td>
                    </tr>
                </tbody>
            </table>

            <table width="100%" border="0">
                <tbody>
                    <tr>
                        <td colspan="4" align="center">
                            <label class="headtitlekop"><b>LEMBAR KOREKSI ASESOR DAN PENGESAHAN PIMPINAN</b><br>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table width="10%" border="0" align="center">
                <tbody>
                    <tr>
                        <td nowrap="nowrap"></td>
                        <td nowrap="nowrap">Nama</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->gelar_depan. ' '. $dosen->nama . ', ' .$dosen->gelar_belakang}}
                        </td>
                    </tr>
                    <tr>
                        <td nowrap="nowrap"></td>
                        <td nowrap="nowrap">NIDN</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->nidn }}</td>
                    </tr>
                    <tr>
                        <td nowrap="nowrap"></td>
                        <td nowrap="nowrap">Jurusan/Prodi</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->jurusan['nama'] }}</td>
                    </tr>
                    <tr>
                        <td nowrap="nowrap"></td>
                        <td nowrap="nowrap">Fakultas</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->jurusan->fakultas['nama'] }}</td>
                    </tr>
                    <tr>
                            <td nowrap="nowrap"></td>
                        <td nowrap="nowrap">Perguruan Tinggi</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->pt }}</td>
                    </tr>
                    <tr>
                            <td nowrap="nowrap"></td>
                        <td nowrap="nowrap">Semester-Tahun Laporan</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->semester .' - '. $dosen->thn_akademik}}</td>
                    </tr>
                    <tr>
                            <td nowrap="nowrap"></td>
                        <td nowrap="nowrap">Status</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->jenis_dosen }}</td>
                    </tr>
                </tbody>
            </table>
                    <table width="100%" border="1">
                        <tbody>
            
                            <tr>
                                <td align="center"><b>No</b></td>
                                <td align="center"><b>Keterangan</b></td>
                                <td align="center"><b>Syarat (PP 37 TH 2009)</b></td>
                                <td align="center"><b>Kinerja</b></td>
                                <td align="center"><b>Kesimpulan</b></td>
                            </tr>
        
                            <tr>
                                <td align="center">1<&nbsp;</td>
                                <td align="center">Pendidikan&nbsp;</td>
                                <td align="center">Tidak Boleh Kosong&nbsp;</td>
                                <td align="center">{{$pendidikan}} SKS&nbsp;</td>
                                <td align="center">
                                    @if($pendidikan == 0)
                                    <p class="text-red">Tidak Memenuhi</p>
                                    @else
                                    Memenuhi
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="center">2<&nbsp;</td>
                                <td align="center">Penelitian&nbsp;</td>
                                <td align="center">Tidak Boleh Kosong&nbsp;</td>
                                <td align="center">{{$penelitian}} SKS&nbsp;</td>
                                <td align="center">
                                    @if($penelitian == 0)
                                    Tidak Memenuhi&nbsp;
                                    @else
                                    Memenuhi
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="center">3<&nbsp;</td>
                                <td align="center">Pengabdian&nbsp;</td>
                                <td align="center">Tidak Boleh Kosong&nbsp;</td>
                                <td align="center">{{$pengabdian}} SKS&nbsp;</td>
                                <td align="center">
                                    @if($pengabdian == 0)
                                    Tidak Memenuhi&nbsp;
                                    @else
                                    Memenuhi
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="center">4<&nbsp;</td>
                                <td align="center">Pendidikan + Penelitian&nbsp;</td>
                                <td align="center">Minimal 9 SKS&nbsp;</td>
                                <td align="center">{{$a}} SKS&nbsp;</td>
                                <td align="center">
                                    @if($a < 9)
                                    Tidak Memenuhi&nbsp;
                                    @else
                                    Memenuhi
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="center">5<&nbsp;</td>
                                <td align="center">Pengabdian + Penunjang&nbsp;</td>
                                <td align="center">Minimal 3 SKS&nbsp;</td>
                                <td align="center">{{$b}} SKS&nbsp;</td>
                                <td align="center">
                                    @if($a < 3)
                                    Tidak Memenuhi&nbsp;
                                    @else
                                    Memenuhi
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="center">6<&nbsp;</td>
                                <td align="center">Total Kinerja&nbsp;</td>
                                <td align="center">Min. 12 SKS, Mak. 16 SKS&nbsp;</td>
                                <td align="center">{{$total}} SKS&nbsp;</td>
                                <td align="center">
                                    @if($total < 12 || $total > 16)
                                    Tidak Memenuhi&nbsp;
                                    @else
                                    Memenuhi
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <label class="headtitlekop"><b>
                                        @if($total < 12 || $total > 16)
                                        Kesimpulan: Tidak memenuhi syarat UU
                                        @else
                                        Kesimpulan: Memenuhi syarat UU
                                        @endif
                                    </b><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            
                    <p align="center"><b>PERNYATAAN DOSEN</b> <br>Saya dosen yang membuat laporan kinerja ini menyatakan bahwa semua
                        aktifitas dan bukti pendukungnya aktifitas saya dan saya sanggup menerimasanksi apapun termasuk penghentian
                        tunjangan dan mengembalikan yang sudah saya terima apabila pernyataan ini dikemudian hari terbukti tidak
                        benar</p>
            
                    <table class="tabelFooter" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td width="1%" valign="top">
                                </td>
            
                                <td>
                                    <table width="500" align="center">
                                        <tbody>
                                            <tr>
            
                                                <td align="center">
                                                    <span>Dosen Yang Membuat</span><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="bottom" nowrap="nowrap" height="81">
                                                    <<span>
                                                        <u>{{ $dosen->gelar_depan. ' '. $dosen->nama . ', ' .$dosen->gelar_belakang}}</u></span><br>
                                                        <span>NIDN. {{ $dosen->nidn }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
            
                                </td>
                                <td width="10%">
            
                                    <table width="1%">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <br>
                                                    <br>
                                                    <span id=""></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="bottom" nowrap="nowrap" height="81"> <span id=""></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="25%">
                    </table>
            
                    <div class="page-break"></div>
            
                    <p align="center"><b>PERNYATAAN ASESOR</b> <br>Saya sudah memeriksa kebenaran kebenaran dokumen yang ditunjukan
                        dan bisa menyetujui laporan evaluasi ini</p>
            
                    <table class="tabelFooter" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td width="1%" valign="top">
                                </td>
            
                                <td width="1%">
                                    <table width="1%" border="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <span>Asesor I</span><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="bottom" nowrap="nowrap" height="81">
                                                        <span><u>{{ $asesor->asesor1['nama'] }}</u></span><br>
                                                        <span>NIDN. {{ $asesor->asesor1['nidn'] }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
            
                                </td>
                                <td width="10%">
            
                                    <table width="1%">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <br>
                                                    <br>
                                                    <span id=""></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="bottom" nowrap="nowrap" height="81"> <span id=""></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="25%">
            
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <span id="" style="display:none"></span>
                                                    <span>Asesor II</span><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="bottom" nowrap="nowrap" height="81">
                                                        <span><u>{{ $asesor->asesor2['nama'] }}</u></span><br>
                                                        <span>NIDN. {{ $asesor->asesor2['nidn'] }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            
                                    <table width="500" align="center">
                                        <tbody>
                                            <tr>
            
                                                <td align="center">
                                                    <span>Mengtahui</span><br>
                                                    <span>{{ $dosen->jurusan['nama'] }}</span><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="bottom" nowrap="nowrap" height="81">
                                                    <<span>
                                                        <u>{{ $dosen->nama_kajur }}</u></span><br>
                                                        <span>NIDN. </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </body>
            
            </html>
            
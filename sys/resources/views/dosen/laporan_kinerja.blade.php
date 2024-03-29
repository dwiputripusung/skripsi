<html>

<head>
    <title>Cetak Laporan Kinerja Dosen</title>
    <style>
        .page-break {
            page-break-after: always;
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

            <br>

            <table width="100%" border="0">
                <tbody>
                    <tr>
                        <td colspan="4" align="center">
                            <label class="headtitlekop">LAPORAN KINERJA DOSEN<br>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>
            <br>

            <table width="10%" border="0" align="center">
                <tbody> 
                    <tr>
                        <td nowrap="nowrap">Nama</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->gelar_depan. ' '. $dosen->nama . ', ' .$dosen->gelar_belakang}}
                        </td>
                    </tr>
                    <tr>
                        <td nowrap="nowrap">No.Sertifikat/NIDN</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->no_sertifikat. ' / ' . $dosen->nidn }}</td>
                    </tr>
                    <tr>
                        <td nowrap="nowrap">Jurusan/Prodi</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->jurusan['nama'] }}</td>
                    </tr>
                    <tr>
                        <td nowrap="nowrap">Perguruan Tinggi</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->pt}}</td>
                    </tr>
                    <tr>
                        <td nowrap="nowrap">Semester-Tahun Laporan</td>
                        <td nowrap="nowrap">:</td>
                        <td nowrap="nowrap">{{ $dosen->semester .' - '. $dosen->thn_akademik}}</td>
                    </tr>

                    <td colspan="4" align="center">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        {{-- <label class="headtitlekop">JURUSAN PTIK/TEKNIK INFORMATIKA<br> --}}
                        <label class="headtitlekop">Jurusan {{ $dosen->jurusan['nama'] }}<br>
                            {{ $dosen->jurusan->fakultas['nama'] }}<br></label>
                        {{ $dosen->pt }}<br></label>
                    </td>
                </tbody>
            </table>
        </div>
    </div>
    <div class="page-break"></div>
    <div class="page-landscape">
        <table width="100%" border="0">
            <tbody>
                <td colspan="5">
                    <label class="headtitlekop"><b>I. IDENTITAS</b>
                </td>
            </tbody>
        </table>
        <table width="10%" border="0">
            <tbody>
                <tr>
                    <td nowrap="nowrap">Nama</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->gelar_depan. ' '. $dosen->nama . ', ' .$dosen->gelar_belakang}}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">No.Sertifikat/NIDN</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->no_sertifikat. ' / ' . $dosen->nidn }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">Perguruan Tinggi</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->pt }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">Status</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->jenis_dosen }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">Alamat PT</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->alamat_pt }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">Jurusan</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->jurusan['nama'] }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">Jab. Fungsional/Gol.</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->jab_fungsional .' - '. $dosen->golongan}}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">Tempat - Tgl. Lahir</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->tmpt_lhr .' - '. $dosen->tgl_lhr}}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">S1</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->pend_s1 }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">S2</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->pend_s2 }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">S3</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->pend_s3 }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">Ilmu Yang Ditekuni</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->bid_ilmu }}</td>
                </tr>
                <tr>
                    <td nowrap="nowrap">No. HP</td>
                    <td nowrap="nowrap">:</td>
                    <td nowrap="nowrap">{{ $dosen->no_hp }}</td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="1">
            <tbody>

                <tr>
                    <td rowspan="2" align="center"><b>No</b></td>
                    <td rowspan="2" align="center"><b>Kegiatan</b></td>
                    <td colspan="2" align="center"><b>Beban Kerja</b></td>
                    <td rowspan="2" align="center"><b>Masa Penugasan</b></td>
                    <td colspan="2" align="center"><b>Kinerja</b></td>
                    <td rowspan="2" align="center"><b>Penilaian/Rekomendasi Asesor</b></td>
                </tr>
                <tr>
                    <td align="center"><b>Bukti Penugasan</b></td>
                    <td align="center"><b>SKS</b></td>
                    <td align="center"><b>Bukti Kinerja</b></td>
                    <td align="center"><b>Capaian</b></td>
                </tr>

                <tr>
                    <td colspan="8">
                        <label class="headtitlekop"><b>II. BIDANG PENDIDIKAN</b><br>
                    </td>
                </tr>
                @php
                $no_pendidikan = 0;
                $no_penelitian = 0; 
                $no_pengabdian = 0;
                @endphp
                @foreach($pendidikan as $pendidikan)
                @php
                $no_pendidikan += 1;  
                @endphp
                <tr>
                    <td align="center">{{ $no_pendidikan }}&nbsp;</td>
                    <td align="center"><p>{{ $pendidikan->nama_kegiatan }}</p>&nbsp;</td>
                    <td align="center">{{ $pendidikan->buktipenugasan_bebankerja_ket }}&nbsp;</td>
                    <td align="center">{{ $pendidikan->sks_bebankerja }}&nbsp;</td>
                    <td align="center">{{ $pendidikan->masa_penugasan }}&nbsp;</td>
                    <td align="center">{{ $pendidikan->buktidokumen_kinerja_ket}}&nbsp;</td>
                    <td align="center">{{ $pendidikan->sks_kinerja }}&nbsp;</td>
                    <td align="center">{{ $pendidikan->rekomendasi }}&nbsp;</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="8">
                        <label class="headtitlekop"><b>III. BIDANG PENELITIAN DAN PENGEMBANGAN ILMU</b><br>
                    </td>
                </tr>
                @foreach($penelitian as $penelitian)
                @php
                $no_penelitian =+ 1; 
                @endphp
                <tr>
                    <td align="center">{{ $no_penelitian }}&nbsp;</td>
                    <td align="center">{{ $penelitian->nama_kegiatan }}&nbsp;</td>
                    <td align="center">{{ $penelitian->buktipenugasan_bebankerja_ket }}&nbsp;</td>
                    <td align="center">{{ $penelitian->sks_bebankerja }}&nbsp;</td>
                    <td align="center">{{ $penelitian->masa_penugasan }}&nbsp;</td>
                    <td align="center">{{ $penelitian->buktidokumen_kinerja_ket}}&nbsp;</td>
                    <td align="center">{{ $penelitian->sks_kinerja }}&nbsp;</td>
                    <td align="center">{{ $penelitian->rekomendasi }}&nbsp;</td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="8">
                        <label class="headtitlekop"><b>IV. BIDANG PENGABDIAN KEPADA MASYARAKAT</b><br>
                    </td>
                </tr>

                @foreach($pengabdian as $pengabdian)
                @php
                $no_pengabdian =+ 1; 
                @endphp
                <tr>
                    <td align="center">{{ $no_pengabdian }}&nbsp;</td>
                    <td align="center">{{ $pengabdian->nama_kegiatan }}&nbsp;</td>
                    <td align="center">{{ $pengabdian->buktipenugasan_bebankerja_ket }}&nbsp;</td>
                    <td align="center">{{ $pengabdian->sks_bebankerja }}&nbsp;</td>
                    <td align="center">{{ $pengabdian->masa_penugasan }}&nbsp;</td>
                    <td align="center">{{ $pengabdian->buktidokumen_kinerja_ket}}&nbsp;</td>
                    <td align="center">{{ $pengabdian->sks_kinerja }}&nbsp;</td>
                    <td align="center">{{ $pengabdian->rekomendasi }}&nbsp;</td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="8">
                        <label class="headtitlekop"><b>V. PENUNJANG LAINNYA</b><br>
                    </td>
                </tr>

                @foreach($penunjang as $penunjang)
                @php
                $no_penunjang =+ 1; 
                @endphp
                <tr>
                    <td align="center">{{ $no_penunjang }}&nbsp;</td>
                    <td align="center">{{ $penunjang->nama_kegiatan }}&nbsp;</td>
                    <td align="center">{{ $penunjang->buktipenugasan_bebankerja_ket }}&nbsp;</td>
                    <td align="center">{{ $penunjang->sks_bebankerja }}&nbsp;</td>
                    <td align="center">{{ $penunjang->masa_penugasan }}&nbsp;</td>
                    <td align="center">{{ $penunjang->buktidokumen_kinerja_ket}}&nbsp;</td>
                    <td align="center">{{ $penunjang->sks_kinerja }}&nbsp;</td>
                    <td align="center">{{ $penunjang->rekomendasi }}&nbsp;</td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <div class="page-break"></div>

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
                                        <span><u>{{ $asesor->asesor1['gelar_depan'] .' '. $asesor->asesor1['nama'] .' '. $asesor->asesor1['gelar_belakang'] }}</u></span><br>
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
                                        <span><u>{{ $asesor->asesor2['gelar_depan'] .' '. $asesor->asesor2['nama'] .' '. $asesor->asesor2['gelar_belakang'] }}</u></span><br>
                                        <span>NIDN. {{ $asesor->asesor2['nidn'] }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>

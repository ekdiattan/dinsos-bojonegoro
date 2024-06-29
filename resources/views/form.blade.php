@extends('templatepublic.main')

@section('contents')
<br>
<br>
<br>
<br>
<br>
    <div class="survey3">
        <div class="profil-survey3">
            <h3>Profile Responden</h3>
            <br />
            <form id="surveyForm" action="/formsurvey" method="post">
                @csrf
                <table class="table1-survey3">
                    <tr>
                        <td width="350">Nama Perusahaan / Instansi / Perorangan</td>
                        <td><input type="text" name="NamaPerusahaanInstansiPerorangan" required/></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="Alamat" required/></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td><input type="text" name="Pekerjaan" required/></td>
                    </tr>
                    <tr>
                        <td>No. Hp</td>
                        <td><input type="number" name="NomorTelepon" required/></td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>
                            <select name="Umur" required>
                                <option value="<20"> Kurang dari 20</option>
                                <option value="20-29">20 - 29</option>
                                <option value="30-39">30 - 39</option>
                                <option value="40-49">40 - 49</option>
                                <option value=">=50">Lebih dari 50</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>
                            <select name="Agama" required>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <select name="JenisKelamin" required>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Responden</td>
                        <td><input type="text" name="StatusResponden" required/></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td>
                            <select name="PendidikanTerakhir" required>
                                <option value="SEKOLAH DASAR ( SD )">SEKOLAH DASAR ( SD )</option>
                                <option value="SEKOLAH MENENGAH PERTAMA ( SMP )">SEKOLAH MENENGAH PERTAMA ( SMP )</option>
                                <option value="SEKOLAH MENENGAH ATAS ( SMA )/ SEKOLAH MENENGAH KEJURUSAN ( SMK )">SEKOLAH MENENGAH ATAS ( SMA )/ SEKOLAH MENENGAH KEJURUSAN ( SMK )</option>
                                <option value="DIPLOMA I / II">DIPLOMA I / II</option>
                                <option value="DIPLOMA III / S1">DIPLOMA III / S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </td>
                    </tr>
                </table>
        </div>
    </div>
    <div class="survey4">
        <div class="pendapat-survey4">
            <h3>Pendapat Responden Tentang Pelayanan</h3>
            <br />
            <div class="grid-container">
                @foreach ($pertanyaan as $item)
                <div class="service__card">
                    <h4>{{ $item->Pertanyaan }}</h4>
                    <br />
                    <hr />
                    <br />
                    <table>
                        <tr>
                            <td>
                                <input type="radio" name="nilai_{{$item->PertanyaanId}}" value="Sangat Baik" checked> Sangat Baik
                            </td>
                            <td>
                                <input type="radio" name="nilai_{{$item->PertanyaanId}}" value="Kurang Baik"> Kurang Baik
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" name="nilai_{{$item->PertanyaanId}}" value="Baik"> Baik
                            </td>
                            <td>
                                <input type="radio" name="nilai_{{$item->PertanyaanId}}" value="Tidak Baik"> Tidak Baik
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach
            
            </div>
        </div>
    </div>
    <div class="survey5">
        <div class="textarea-survey5">
            <h3>Saran dan Kritik</h3>
            <div class="wrapper">
                <textarea spellcheck="false" placeholder="Type something here..." name="KritikSaran" required></textarea>
            </div>
            <br />
            <div class="emojipicker">
                <div class="containeremoji">
                    <input type="radio" name="KepuasanSangatPuas" id="one" value="1" class="emoji-radio" checked />
                    <label for="one">
                        <img src="{{asset('images/emoji1.png')}}" alt="" />
                        <div class="emoji-text" id="emoji-text1">Sangat Puas</div>
                    </label>
                    <input type="radio" name="KepuasanPuas" id="two" value="1" class="emoji-radio" />
                    <label for="two">
                        <img src="{{asset('images/emoji2.png')}}" alt="" />
                        <div class="emoji-text" id="emoji-text2">Puas</div>
                    </label>
                    <input type="radio" name="KepuasanCukupPuas" id="three" value="1" class="emoji-radio" />
                    <label for="three">
                        <img src="{{asset('images/emoji3.png')}}" alt="" />
                        <div class="emoji-text" id="emoji-text3">Cukup Puas</div>
                    </label>
                    <input type="radio" name="KepuasanTidakPuas" id="four" value="1" class="emoji-radio" />
                    <label for="four">
                        <img src="{{asset('images/emoji4.png')}}" alt="" />
                        <div class="emoji-text" id="emoji-text4">Tidak Puas</div>
                    </label>
                </div>
            </div>
            <div class="grid-container-survey5">
                <div class="grid-container-survey5-button">
                    <button class="button-24" role="button" type="submit">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    
    <script src="{{asset('Javascript/Form/form.js')}}"></script>

    <br />
    <br />
    <br />
@endsection
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Visi dan Misi <br> Laboratorium Komputer</h1>

    <div class="card p-4 shadow rounded-3">
        <h3>Visi</h3>
        <p class="text-justify">
            Mewujudkan Laboratorium Komputer yang mendukung pelaksanaan Tridharma Perguruan Tinggi, 
            pengembangan ilmu komputer dan kewirausahaan, serta pelayanan praktikum yang berkualitas, 
            profesional, dan berstandar internasional bagi civitas akademika dan masyarakat.
        </p>

        <h3 class="mt-4">Misi</h3>
        <ul class="list-unstyled ps-3">
            <li class="mb-3">
                <strong>1.</strong> Menyediakan infrastruktur komputer dan fasilitas pendukung lainnya 
                yang memadai, serta menyesuaikan dengan kebutuhan dan perkembangan teknologi untuk seluruh 
                pengguna Laboratorium Komputer.
            </li>
            <li class="mb-3">
                <strong>2.</strong> Memberikan pelayanan terbaik kepada seluruh pengguna laboratorium 
                dalam kegiatan pembelajaran, penelitian, pengabdian kepada masyarakat, serta 
                pengembangan kewirausahaan.
            </li>
            <li class="mb-3">
                <strong>3.</strong> Menyediakan layanan teknologi informasi dan komputer, serta konsultasi 
                dan pelatihan yang diperlukan, berkaitan dengan aktivitas pendidikan dan pengajaran, 
                penelitian dan pengembangan, tugas sosial dan pengabdian, kegiatan ilmiah, serta 
                administrasi bagi stakeholder Universitas Dian Nuswantoro.
            </li>
        </ul>
    </div>
</div>
@endsection

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }
    .card {
        background-color: #ffffff;
    }
    h1, h3 {
        font-weight: bold;
    }
    ul {
        margin-top: 10px;
    }
    ul li {
        margin-bottom: 12px;
        line-height: 1.6;
    }
    p {
        text-align: justify;
        line-height: 1.6;
    }
</style>

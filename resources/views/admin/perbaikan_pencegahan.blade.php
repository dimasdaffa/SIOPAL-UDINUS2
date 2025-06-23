<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulir PTPP SKT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .container {
            border: 1px solid black;
            width: 100%;
            box-sizing: border-box;
        }
        .header-container {
            display: flex;
            border-bottom: 1px solid black;
        }
        .logo-container {
            width: 25%;
            padding: 10px;
            text-align: center;
            border-right: 1px solid black;
        }
        .logo {
            width: 100px;
            height: 100px;
        }
        .header-text {
            width: 75%;
            text-align: center;
            padding: 10px;
        }
        .header-title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 5px;
        }
        .header-subtitle {
            font-weight: bold;
            font-size: 14px;
        }
        .document-info {
            display: flex;
            border-bottom: 1px solid black;
        }
        .document-info-left {
            width: 75%;
            padding: 5px 10px;
            border-right: 1px solid black;
        }
        .document-info-right {
            width: 25%;
            padding: 5px 10px;
        }
        .info-row {
            display: flex;
            margin: 2px 0;
        }
        .info-label {
            width: 120px;
            font-weight: bold;
        }
        .info-value {
            flex: 1;
        }
        .form-section {
            padding: 10px;
            border-bottom: 1px solid black;
        }
        .form-row {
            display: flex;
            margin: 5px 0;
        }
        .form-label {
            width: 150px;
        }
        .form-field {
            flex: 1;
            position: relative;
        }
        .dotted-line {
            border-bottom: 1px dotted #000;
            height: 18px;
            width: 100%;
            display: inline-block;
        }
        .multi-line {
            height: 60px;
            border: none;
            width: 100%;
            background-image: linear-gradient(to bottom, white 23px, #ccc 24px, white 24px);
            background-size: 100% 24px;
            line-height: 24px;
            margin-top: 5px;
        }
        .signature-section {
            display: flex;
            padding: 10px;
        }
        .signature-box {
            width: 50%;
            text-align: center;
        }
        .signature-title {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .signature-area {
            height: 100px;
            border: 1px solid #000;
            margin: 10px auto;
            width: 80%;
        }
        .signature-name {
            margin-top: 5px;
            font-style: italic;
        }
        .signature-line {
            border-top: 1px solid #000;
            width: 80%;
            margin: 10px auto;
        }
        .time-section {
            display: flex;
            width: 100%;
        }
        .time-label {
            width: 40px;
            text-align: right;
            padding-right: 5px;
        }
        .time-field {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header-container">
            <div class="logo-container">
                <img src="{{ asset('/images/logo-udinus.png') }}" class="logo" alt="Logo UDINUS">
            </div>
            <div class="header-text">
                <div class="header-title">LABORATORIUM KOMPUTER UDINUS</div>
                <div class="header-subtitle">PERMINTAAN TINDAKAN PERBAIKAN DAN PENCEGAHAN (SEKRETARIS)</div>

                <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                    <tr>
                        <td style="text-align: left; width: 50%;">Nomor</td>
                        <td style="text-align: left; width: 50%;">: F-LAB.KOM.UDINUS-SKT.12.01</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Revisi</td>
                        <td style="text-align: left;">: 0</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Tanggal Berlaku</td>
                        <td style="text-align: left;">: 19 September 2022</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Halaman</td>
                        <td style="text-align: left;">: 2 dari 2</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Form Content -->
        <div class="form-section">
            <div class="form-row">
                <div class="form-label">Bentuk Ketidaksesuaian</div>
                <div class="form-field">: <span class="dotted-line">{{ $data->ketidaksesuaian ?? '' }}</span></div>
            </div>
            <div class="form-row">
                <div class="form-label">Lokasi</div>
                <div class="form-field">: <span class="dotted-line">{{ $data->lokasi ?? '' }}</span></div>
            </div>
            <div class="form-row">
                <div class="form-label">Tanggal Kejadian</div>
                <div class="form-field">: <span class="dotted-line">{{ $data->tgl_kejadian ?? '' }}</span></div>
                <div class="time-section">
                    <div class="time-label">Jam</div>
                    <div class="time-field">: <span class="dotted-line">{{ $data->jam_kejadian ?? '' }}</span></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Tanggal Laporan</div>
                <div class="form-field">: <span class="dotted-line">{{ $data->tgl_laporan ?? '' }}</span></div>
                <div class="time-section">
                    <div class="time-label">Jam</div>
                    <div class="time-field">: <span class="dotted-line">{{ $data->jam_laporan ?? '' }}</span></div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <div>Hasil / Uraian Pengamatan Ketidaksesuaian / Potensi Ketidaksesuaian:</div>
            <div class="multi-line">{{ $data->hasil_pengamatan ?? '' }}</div>
        </div>

        <div class="form-section">
            <div>Tindakan Langsung:</div>
            <div class="multi-line">{{ $data->tindakan_langsung ?? '' }}</div>
        </div>

        <div class="form-section">
            <div>Permintaan Tindakan Perbaikan dan Pencegahan:</div>
            <div class="multi-line">{{ $data->permintaan_perbaikan ?? '' }}</div>
        </div>

        <div class="signature-section">
            <div class="signature-box">
                <div class="signature-title">Pelapor</div>
                <div class="signature-area">
                    @if(isset($data->nama_pelapor))
                        <div style="margin-top: 70px; font-weight: bold;">{{ $data->nama_pelapor }}</div>
                        <div>{{ $data->bagian_pelapor ?? '' }} - {{ $data->jabatan_pelapor ?? '' }}</div>
                    @endif
                </div>
                <div class="signature-line"></div>
            </div>
            <div class="signature-box">
                <div class="signature-title">Disetujui</div>
                <div class="signature-area">
                    <div style="margin-top: 70px; font-style: italic;">TTD Disetujui Oleh</div>
                </div>
                <div class="signature-line"></div>
            </div>
        </div>
    </div>
</body>
</html>

<link rel="icon" type="image/png"
    href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
<title>RS Harmoni Kehidupan</title>
<script src="https://cdn.tailwindcss.com"></script>
<style type="text/tailwindcss">
    @layer utilities {
        @page {
            size: A4;
            margin: 10mm;
        }

        @media print {
            body {
                width: 210mm;
                height: 297mm;
            }

            .break-inside-avoid {
                break-inside: avoid;
            }
        }
    }

    .table-header {
        border-collapse: collapse;
        width: 100%;
    }

    .table-header th,
    .table-header td {
        border: 1px solid #d1d5db;
        padding: 8px;
        text-align: left;
    }

    .section-spacing {
        margin-top: 30px;
        /* Adjust the spacing as needed */
    }
</style>
</head>

<body class="font-sans text-xs leading-tight text-gray-800 h-full flex justify-center" onload="window.print();">
    <div class="w-[190mm] mx-auto p-4 print:p-0">

        <div class="flex items-center mb-4 border-b-2 border-black pb-3">
            <div class="flex-none ml-2 w-1/5 pr-4">
                <img src="/img/logo_rs.png" alt="Logo RS"
                    class="w-full max-w-[115px] h-auto">
            </div>
            <div class="flex-grow">
                <div class="text-3xl font-bold mb-1">RS Harmoni Kehidupan</div>
                <div class="text-[10pt] leading-snug">
                    Jl. Mayjen Sutoyo, Karanganyar,<br>
                    Kec. Subang, Kabupaten Subang, Jawa Barat 41211<br>
                    Telp: (0291)123432 / 081222885323 | Email: harmonikehidupan@gmail.com
                </div>
            </div>
        </div>

        <div class="text-center mb-4">
            <h2 class="text-red-500 text-lg font-bold text-center">Riwayat Medis</h2>
            <h5 class="text-gray-600 mt-1">Tanggal: {{ now()->format('d-m-Y') }}</h5>
        </div>

        <div class="overflow-x-auto print:overflow-x-visible">
            <table class="table-header">
                <!-- First Row Group -->
                <thead>
                    <h1><b>Tabel:</b> Pasien</h1>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2 w-[30%]">Nama</th>
                        <th class="border border-gray-300 p-2 w-[30%]">BPJS</th>
                        <th class="border border-gray-300 p-2 w-[30%]">No HP</th>
                        <th class="border border-gray-300 p-2 w-[30%]">Gender</th>
                        <th class="border border-gray-300 p-2 w-[30%]">Email</th>
                    </tr>
                </thead>
                @foreach ($data_pdf as $riwayat)
                <tbody>
                    <!-- Rows for the first group -->
                    <tr>
                        <td>{{ $riwayat->name }}</td>
                        <td>{{ $riwayat->no_bpjs }}</td>
                        <td>{{ $riwayat->no_hp }}</td>
                        <td>{{ $riwayat->gender }}</td>
                        <td>{{ $riwayat->email }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="section-spacing"></div> <!-- Spacing between tables -->

            <table class="table-header">
                <!-- Second Row Group -->
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2 w-[30%]">Tanggal Lahir</th>
                        <th class="border border-gray-300 p-2 w-[30%]">Gol Darah</th>
                        <th class="border border-gray-300 p-2 w-[30%]">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows for the second group -->
                    <tr>
                        <td>{{ $riwayat->tanggal_lahir }}</td>
                        <td>{{ $riwayat->gol_darah }}</td>
                        <td>{{ $riwayat->alamat }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="section-spacing"></div> <!-- Spacing between tables -->

            <table class="table-header">
                <!-- Second Row Group -->
                <h1><b>Tabel:</b> Obat</h1>
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2 w-[30%]">Nama Obat</th>
                        <th class="border border-gray-300 p-2 w-[30%]">Harga</th>
                        <th class="border border-gray-300 p-2 w-[30%]">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows for the second group -->
                    <tr>
                        <td>{{ $riwayat->nama_obat }}</td>
                        <td>{{ $riwayat->harga }}</td>
                        <td>{{ $riwayat->jumlah }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="section-spacing"></div> <!-- Spacing between tables -->
            
            <table class="table-header">
                <!-- Second Row Group -->
                <h1><b>Tabel:</b> Dokter</h1>
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2 w-[30%]">Tanggal Pemeriksaan</th>
                        <th class="border border-gray-300 p-2 w-[20%]">Keluhan</th>
                        <th class="border border-gray-300 p-2 w-[20%]">Dokter</th>
                        <th class="border border-gray-300 p-2 w-[30%]">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows for the second group -->
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($riwayat->tanggal_pemeriksaan)->format('d-m-Y') }}</td>
                        <td>{{ $riwayat->keluhan }}</td>
                        <td>{{ $riwayat->dokter }}</td>
                        <td>{{ $riwayat->catatan_dokter }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

        <div class="mt-4 break-inside-avoid">
            <p class="text-lg"><b>RS Harmoni Kehidupan</b></p>
            <p class="">Informasi ini merupakan informasi resmi dari <b>RS Harmoni Kehidupan</b> untuk para pasien agar mempunyai riwayat medis
            yang tersimpan rapih agar memudahkan pemeriksaan berikutnya. <b>Semoga cepat membaik.</b></p>
        </div>
    </div>
</body>

</html>

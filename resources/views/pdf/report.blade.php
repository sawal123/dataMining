<!DOCTYPE html>
<html>

<head>
    <title>Report PDF</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <style>
        /* styles.css */

        .text-center {
            text-align: center;
            margin-top: 1.25rem;
            /* equivalent to mt-5 in Tailwind */
        }

        .font-bold {
            font-weight: bold;
        }

        .text-lg {
            font-size: 1.125rem;
            /* equivalent to text-lg in Tailwind */
        }

        .hr-2 {
            border-width: 2px;
            margin-top: 1rem;
            /* equivalent to mt-4 in Tailwind */
            border-color: black;
        }

        .hr-1 {
            border-width: 1px;
            margin-top: 0.25rem;
            /* equivalent to mt-1 in Tailwind */
            border-color: black;
        }

        /* styles.css */

        .flex {
            display: flex;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .mt-24 {
            margin-top: 6rem;
            /* equivalent to mt-24 in Tailwind */
        }

        .me-24 {
            margin-right: 6rem;
            /* equivalent to me-24 in Tailwind */
        }

        .text-center {
            text-align: center;
        }

        .mt-20 {
            margin-top: 5rem;
            /* equivalent to mt-20 in Tailwind */
        }
    </style>
</head>

<body>
    @include('components.style-tabel')
    <div class="text-center mt-5">
        <h1 class="font-bold text-lg">CV. UNTUNG ADA NODA</h1>
        <p>Jl. Padang Golf No.10, Suka Damai, Kec. Medan Polonia, Kota Medan, Sumatera Utara 20157</p>
        <hr class="hr-2">
        <hr class="hr-1">
    </div>
    <table class="responstable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Cluster</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultF as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['nama_barang'] }}</td>
                    <td>{{ $item['cluster'] }}</td>
                    <td>{{ $item['keterangan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-end mt-24 ">
        <div class="text-center">
            <p>Medan, {{ date('d M Y') }}</p>
            <p>Diketahui Oleh</p>
            <p class="mt-20">
                Detty
            </p>
        </div>
    </div>
    {{-- <script src="{{asset('build/assets/app-C1-XIpUa.js')}}"></script> --}}
</body>

</html>

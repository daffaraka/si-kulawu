<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>

</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">No. Pesanan</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Nama & <br> Kontak Customer</th>
                <th scope="col" class="w-25">Detail Produk</th>
                <th scope="col">Total Harga + Ongkir</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Status Pesanan</th>
                <th scope="col">No. Resi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $data)
                <tr class="">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->order_id }}</td>
                    <td>{{ $data->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $data->user->name }} - {{ $data->user->email }} - {{ $data->user->phone }}</td>
                    <td>
                        <ul>
                            @foreach ($data->transaksiProduct as $product)
                                <li>
                                    {{ $product->product->nama_produk }} - {{ $product->qty }} -
                                    Rp.{{ number_format($product->product->harga_produk) }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td> Rp. {{ number_format($data->total_price) }}</td>
                    <td>{{ $data->metode_pembayaran }}</td>
                    <td>
                        @if ($data->payment_status == '1')
                            Menunggu Pembayaran
                        @elseif($data->payment_status == '2')
                            Pembayaran Dikonfirmasi
                        @elseif($data->payment_status == '3')
                            Diproses
                        @elseif($data->payment_status == '4')
                            Dikirim
                        @elseif($data->payment_status == '5')
                            Sampai di Tujuan
                        @elseif($data->payment_status == '6')
                            Selesai
                        @else
                            Status Tidak Valid
                        @endif
                    </td>
                    <td>{{ $data->no_resi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

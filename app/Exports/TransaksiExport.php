<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransaksiExport implements FromCollection,WithHeadings,WithMapping, ShouldAutoSize,WithStyles
{

    private $counter = 0;
    
    use Exportable;

    public function collection()
    {
        $transaksi = Transaksi::with(['user', 'transaksiProduct.product'])->get();

        return $transaksi;
    }
    
    public function headings(): array
    {
        return [
            '#',
            'Nama Pemesan',
            'Number',
            'Produk - Harga Produk - Qty',
            'Total Harga',
            'Payment Status',
        ];
    }

    public function map($transaksi) : array
    {
        return [
            ++$this->counter,
            $transaksi->user->name,
            $transaksi->number,
            $transaksi->transaksiProduct->map(function ($product) {
                return $product->product->nama_produk . ' - Rp. ' . number_format($product->product->harga_produk, 0, ',', '.') . ' - ' . $product->qty.' item';
            })->implode("\n"), // Menggunakan newline sebagai pemisah
            'Rp. ' . number_format($transaksi->total_price, 0, ',', '.'),
            $transaksi->payment_status,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'A1:K1'    => ['font' => ['bold' => true]],
        ];

    }
   
}

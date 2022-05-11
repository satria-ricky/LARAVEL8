<?php

namespace App\Imports;

use App\Models\Aset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;

class AsetImport implements WithStartRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 11;
    }

    // public function mapping(): array
    // {
    //     return [
    //         'aset_no_rekening' => '1',
    //         'aset_deskripsi' => '2',
    //         'aset_qty' => 'D11',
    //         'aset_tgl_perolehan' => 'E11',
    //         'aset_tgl_akhir' => 'F11',
    //         'aset_saldo_perolehan' => 'G11',
    //         'aset_akm_susut' => 'H11',
    //         'aset_nilai_buku' => 'I11',
    //         'aset_prs_susut' => 'J11',
    //         'aset_gssl_induk' => 'K11',
    //         'aset_uraian' => 'L11',
    //         'aset_sumber_perolehan' => 'M11',
    //     ];
    // }

    // public function model(array $row)
    // {
    //     return new Aset([
    //         'aset_no_rekening' => $row['aset_no_rekening'],
    //         'aset_deskripsi' => $row['aset_deskripsi'],
    //         'aset_qty' => $row['aset_qty'],
    //         'aset_tgl_perolehan' => $row['aset_tgl_perolehan'],
    //         'aset_tgl_akhir' => $row['aset_tgl_akhir'],
    //         'aset_saldo_perolehan' => $row['aset_saldo_perolehan'],
    //         'aset_akm_susut' => $row['aset_akm_susut'],
    //         'aset_nilai_buku' => $row['aset_nilai_buku'],
    //         'aset_prs_susut' => $row['aset_prs_susut'],
    //         'aset_gssl_induk' => $row['aset_gssl_induk'],
    //         'aset_uraian' => $row['aset_uraian'],
    //         'aset_sumber_perolehan' => $row['aset_sumber_perolehan'],
    //         'aset_foto' => 'foto/asetDefault.png',
    //     ]);
    // }
    public function model(array $row)
    {   
        // dd($row[1]);
        $aset = DB::table('tb_aset')->where('aset_no_rekening', $row[1])->first();
        if (empty($aset)) {
            return new Aset([
                'aset_no_rekening' => $row[1],
                'aset_deskripsi' => $row[2],
                'aset_qty' => $row[3],
                'aset_tgl_perolehan' => $row[4],
                'aset_tgl_akhir' => $row[5],
                'aset_saldo_perolehan' => $row[6],
                'aset_akm_susut' => $row[7],
                'aset_nilai_buku' => $row[8],
                'aset_prs_susut' => $row[9],
                'aset_gssl_induk' => $row[10],
                'aset_uraian' => $row[11],
                'aset_sumber_perolehan' => $row[12],
                'aset_foto' => 'foto/asetDefault.png',
            ]);
        }
    }


    // public function rules(): array
    // {
    //     return [
    //         '1' => 'unique:tb_aset,aset_no_rekening', 
    //     ];
    // }


}

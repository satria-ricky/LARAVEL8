<table>
    <tbody>
        <thead>
            <tr>
                <td> PT. BANK NTB SYARIAH </td>
            </tr>
            <tr>
                <td> Jl. Pejanggik No 30 Mataram, MATARAM </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td>DAFTAR NOMINATIF INVENTARIS</td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>No. Urut</td>                
                <td>No. Rekening</td>
                <td>Deskripsi</td>
                <td>QTY </td>
                <td>Tanggal Perolehan </td>
                <td>Tanggal Akhir </td>
                <td>Saldo Perolehan </td>
                <td>AKM Susut </td>
                <td>Nilai Buku </td>
                <td>PRS Susut </td>
                <td>GSSL Induk </td>
                <td>Uraian </td>
                <td>Sumber Perolehan </td>
            </tr>
        </thead>
        @foreach($data as $row)
        <tr>
            <td>{{ $loop->iteration }} </td>
            <td>{{ $row->aset_no_rekening }}</td>
            <td>{{ $row->aset_deskripsi }}</td>
            <td>{{ $row->aset_qty }}</td>
            <td>{{ $row->aset_tgl_perolehan }}</td>
            <td>{{ $row->aset_tgl_akhir }}</td>
            <td>{{ $row->aset_saldo_perolehan }}</td>
            <td>{{ $row->aset_akm_susut }}</td>
            <td>{{ $row->aset_nilai_buku }}</td>
            <td>{{ $row->aset_prs_susut }}</td>
            <td>{{ $row->aset_gssl_induk }}</td>
            <td>{{ $row->aset_uraian }}</td>
            <td>{{ $row->aset_sumber_perolehan }}</td>
        </tr>    
    @endforeach
    </tbody>
</table>
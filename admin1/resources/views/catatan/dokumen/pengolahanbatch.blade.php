@extends('layout.app')
@section('title')
<title>Pengolahan Batches</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengolahan Batch</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengolahan Batch</li>
        </ol>
        <div class="row">

            <div class="card mb-4">

                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
                        Tambah Pengolahan Batch
                    </button>
                    @endif


                </div>

                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Nomor Batch</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($data as $row)
                        <?php $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row['kode_produk'] }}</td>
                            <td>{{ $row['nama_produk'] }}</td>
                            <td>{{ $row['nomor_batch'] }}</td>
                            <td>
                                @if ($row['status'] == 0)
                                {{ 'Diajukan' }}
                                @else
                                {{ 'Diterima' }}
                                @endif
                            </td>
                            <td>
                                <form action="/detil_batch" method="post" class="float-left mr-2">
                                    @csrf
                                    <input type="hidden" name="nobatch" value="{{ $row['nomor_batch'] }}">
                                    <button type="submit" class="btn btn-primary"> Buka</button>
                                </form>
                                <button class="btn btn-success" id="klikbatch" data-toggle="modal" data-target="#editbatch" data-kode="{{ $row['kode_produk'] }}" data-nama="{{ $row['nama_produk'] }}" data-nobatch="{{ $row['nomor_batch'] }}" data-besar="{{ $row['besar_batch'] }}" data-bentuk="{{ $row['bentuk_sedia'] }}" data-kategori="{{ $row['kategori'] }}" data-kemasan="{{ $row['kemasan'] }}" data-protap="{{ $row['pob'] }}" data-id="{{ $row['batch'] }}">Edit</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="modalForm" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">
                                    Entry Batch
                                </h4>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form method="post" action="tambah_batch" id='forminput'>
                                    <div>
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>
                                            Bagian Produksi
                                        </div>

                                        <div class="card-body">

                                            @csrf
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                                                    Dengan PROTAP No</label>
                                                <div class="col-sm">
                                                    <input type="text" name="pob" class="form-control" id="inputEmail3" placeholder="Nomor PROTAP" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                    Produk</label>
                                                <div class="col-sm">
                                                    <input class="form-control" list="listnamaproduk" type="text" name='nama_produk' id="namaproduk">
                                                    </input>
                                                    <datalist id='listnamaproduk'>
                                                        @foreach ($data2 as $row)
                                                        <option value="{{ $row['produk_nama'] }}">
                                                            {{ $row['produk_nama'] }}
                                                        </option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                                    Produk</label>
                                                <div class="col-sm">
                                                    <input type="text" name="kode_produk" readonly class="form-control" id="kodeproduk" placeholder="Kode Produk" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nomor
                                                    Batch</label>
                                                <div class="col-sm">
                                                    <input type="text" name="no_batch" class="form-control" id="inputEmail3" placeholder="Nomor Batch" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Besar
                                                    Batch</label>
                                                <div class="col-sm">
                                                    <input type="text" name="besar_batch" class="form-control" id="inputEmail3" placeholder="Besar Batch" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Bentuk
                                                    Sediaan</label>
                                                <div class="col-sm">
                                                    <input placeholder="Bentuk Sediaan" class="form-control" name="bentuk sediaan" type="text" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kategori</label>
                                                <div class="col-sm">
                                                    <input placeholder="Kategori" class="form-control" name="kategori" type="text" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kemasan</label>
                                                <div class="col-sm">
                                                    <input type="text" list="kemasan" style="height: 35px;" name="kemasan" class="form-control" id="inlineFormCustomSelect">
                                                    </input>
                                                    <datalist id="kemasan">
                                                        @foreach ($data3 as $row)
                                                        <option value="{{ $row['kemasan_nama'] }}">
                                                            {{ $row['kemasan_nama'] }}
                                                        </option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary" onclick="salert()" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>

    <!-- Modal edit-->
    <div class="modal fade" id="editbatch" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Edit Batch
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form method="post" action="edit_batch" id='forminput1'>
                        <input type="hidden" name="id" id="isi_batchid">
                        <div>
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Bagian Produksi
                            </div>

                            <div class="card-body">

                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                                        Dengan PROTAP No</label>
                                    <div class="col-sm">
                                        <input type="text" name="pob" class="form-control 1" id="isi_protap" placeholder="Nomor PROTAP" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk</label>
                                    <div class="col-sm">
                                        <input class="form-control 1" list="listnamaproduk" type="text" name='nama_produk' id="editnamaproduk">
                                        </input>
                                        <datalist id='listnamaproduk'>
                                            @foreach ($data2 as $row)
                                            <option value="{{ $row['produk_nama'] }}">
                                                {{ $row['produk_nama'] }}
                                            </option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                        Produk</label>
                                    <div class="col-sm">
                                        <input type="text" name="kode_produk" readonly class="form-control 1" id="editkodeproduk" placeholder="Kode Produk" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nomor
                                        Batch</label>
                                    <div class="col-sm">
                                        <input type="text" name="no_batch" class="form-control 1" id="isi_nobatch" placeholder="Nomor Batch" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Besar
                                        Batch</label>
                                    <div class="col-sm">
                                        <input type="text" name="besar_batch" class="form-control 1" id="isi_besar" placeholder="Besar Batch" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bentuk
                                        Sediaan</label>
                                    <div class="col-sm">
                                        <input placeholder="Bentuk Sediaan" class="form-control 1" name="bentuk sediaan" id="isi_bentuk" type="text" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm">
                                        <input placeholder="Kategori" class="form-control 1" name="kategori" id="isi_kategori" type="text" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kemasan</label>
                                    <div class="col-sm">
                                        <input type="text" list="kemasan" style="height: 35px;" name="kemasan" class="form-control 1" id="isi_kemasan">
                                        </input>
                                        <datalist id="kemasan">
                                            @foreach ($data3 as $row)
                                            <option value="{{ $row['kemasan_nama'] }}">
                                                {{ $row['kemasan_nama'] }}
                                            </option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                            </div>

                            <a class="btn btn-primary" onclick="salert1(1)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <script>
        $(document).on('click', "#klikbatch", function() {
            var nama = $(this).data('nama');
            var kode = $(this).data('kode');
            var nobatch = $(this).data('nobatch');
            var besar = $(this).data('besar');
            var bentuk = $(this).data('bentuk');
            var kategori = $(this).data('kategori');
            var kemasan = $(this).data('kemasan');
            var protap = $(this).data('protap');
            var id = $(this).data('id');

            console.log("ini " + nama + " ruangan " + id);
            $("#editnamaproduk").val(nama);
            $("#editkodeproduk").val(nobatch);
            $("#isi_nobatch").val(nobatch);
            $("#isi_besar").val(besar);
            $("#isi_bentuk").val(bentuk);
            $("#isi_kategori").val(kategori);
            $("#isi_kemasan").val(kemasan);
            $("#isi_protap").val(protap);
            $("#isi_batchid").val(id);
            // document.getElementById('cpbahan').value = cpid;
        })

        const produks = JSON.parse('<?= json_encode($data2) ?>')
        $("#namaproduk").change(function() {
            var cekname = produks.find(produk => produk.produk_nama ===
                document.getElementById('namaproduk').value)?.produk_nama;
            if (typeof produks === 'object') {
                console.log("object produks")
                Object.keys(produks).forEach(function(key) {
                    console.log(produks[key]);
                    tmp.push(produks[key]);
                })
            }
            // console.log("tmp bahanbakus", tmp)
            produks = tmp
            if (cekname) {
                document.getElementById('kodeproduk').value = produks.find(produk => produk.produk_nama ===
                    document.getElementById('namaproduk').value).produk_kode
            } else {
                document.getElementById('kodeproduk').value = ""
            }
        });
        $("#editnamaproduk").change(function() {
            var cekname = produks.find(produk => produk.produk_nama ===
                document.getElementById('editnamaproduk').value)?.produk_nama;
            if (typeof produks === 'object') {
                console.log("object produks")
                Object.keys(produks).forEach(function(key) {
                    console.log(produks[key]);
                    tmp.push(produks[key]);
                })
            }
            // console.log("tmp bahanbakus", tmp)
            produks = tmp
            if (cekname) {
                document.getElementById('editkodeproduk').value = produks.find(produk => produk.produk_nama ===
                    document.getElementById('editnamaproduk').value).produk_kode
            } else {
                document.getElementById('editkodeproduk').value = ""
            }
        });
    </script>

</main>
@endsection
    @extends('layout.app')
    @section('title')
    <title>Pengemasan Batch</title>
    @endsection
    @section('content')
    <main>
        <div class="container-fluid px-4">
            <h1>Catatan Pengemasan Batch</h1>
            <ol class="breadcrumb mb-4">Pengemasan Batch</li>
            </ol>
            <div class="row">

                <div class="card mb-4">

                    <div class="card-body">
                        <!-- pop up -->
                        <!-- Button to trigger modal -->
                        @if (Auth::user()->level != 2)
                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm" onclick="setdatetoday()">
                            Tambah Pengemasan Batch
                        </button>
                        @endif
                        <!-- Modal -->
                        <div class="modal fade" id="modalForm" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">
                                            Entry Pengemasan Batch
                                        </h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <p class="statusMsg"></p>
                                        <form method="post" action="tambah_pengemasanbatchproduk" id='forminput'>
                                            <div class="card mb-4">
                                                <div class="card-header" id='headertgl'></div>
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Pengemasan Batch
                                                </div>
                                                @csrf
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <div class="card-body">

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                            Produk</label>
                                                        <div class="col-sm">
                                                            <input class="form-control" list="listnamaproduk" type="text" name='nama_produk' id="namaproduk">
                                                            </input>
                                                            <datalist id='listnamaproduk'>
                                                                @foreach ($produk as $row)
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
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                            Batch</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="no_batch" class="form-control" id="inputEmail3" placeholder="No Batch" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                                                            PROTAP</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="protap" class="form-control" id="inputEmail3" placeholder="Sesuai PROTAP" />
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
                                                            <input type="text" name="bentuk_sediaan" class="form-control" id="inputEmail3" placeholder="Bentuk Sediaan" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kemasan</label>
                                                        <div class="col-sm">
                                                            <input type="text" list="kemasan" style="height: 35px;" name="kemasan" class="form-control" id="inlineFormCustomSelect">
                                                            </input>
                                                            <datalist id="kemasan">
                                                                @foreach ($kemasan as $row)
                                                                <option value="{{ $row['kemasan_nama'] }}">
                                                                    {{ $row['kemasan_nama'] }}
                                                                </option>
                                                                @endforeach
                                                            </datalist>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai</label>
                                                        <div class="col-sm">
                                                            <input type="datetime-local" name="mulai" class="form-control" id="inputEmail3" placeholder="Tipe/Merek" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">selesai</label>
                                                        <div class="col-sm">
                                                            <input type="datetime-local" name="selesai" class="form-control" id="inputEmail3" placeholder="Tipe/Merek" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <a class="btn btn-primary" onclick="salert()" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">
                                                    Simpan</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->


                </div>

                <table class="table mt-1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Sesuai PROTAP</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">No Batch</th>
                            <th scope="col">Besar Batch</th>
                            <th scope="col">Bentuk Sediaan</th>
                            <th scope="col">Kemasan</th>
                            <th scope="col">Tanggal Pengolahan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <?php $i = 0;
                        $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row['protap'] }}</td>
                            <td>{{ $row['kode_produk'] }}</td>
                            <td>{{ $row['nama_produk'] }}</td>
                            <td>{{ $row['no_batch'] }}</td>
                            <td>{{ $row['besar_batch'] }}</td>
                            <td>{{ $row['bentuksediaan'] }}</td>
                            <td>{{ $row['kemasan'] }}</td>
                            <td>{{ $row['mulai'] }} sampai
                                {{ $row['selesai'] }}
                            </td>
                            <td>
                                <?php if ($row['status'] == 0) {
                                    echo 'Diajukan';
                                } elseif ($row['status'] == 1) {
                                    echo 'Diterima';
                                } ?>
                            </td>
                            <td>
                                @if (Auth::user()->level == 2)
                                <form method="post" action="terima_kemasbatch">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $row['id_pengemasanbatchproduk'] }}" />
                                    <button type="submit" class="btn btn-primary" @if($row['status']==1) disabled @endif>terima</button>
                                </form>
                                @else
                                <form method="post" action="detilkemasbatch" class="float-left mr-2">
                                    @csrf
                                    <input type="hidden" name="nobatch" value="{{ $row['id_pengemasanbatchproduk'] }}" />
                                    <button type="submit" class="btn btn-primary">lihat</button>
                                </form>
                                <button id="klik_kemas" type="button" class="btn btn-success" data-toggle="modal" data-target="#editkemasbatch" data-protap="{{ $row['protap'] }}" data-kode="{{ $row['kode_produk'] }}" data-nama="{{ $row['nama_produk'] }}" data-nobatch="{{ $row['no_batch'] }}" data-besar="{{ $row['besar_batch'] }}" data-bentuk="{{ $row['bentuksediaan'] }}" data-kemasan="{{ $row['kemasan'] }}" data-mulai="{{ $newDate = date('Y-m-d\TH:i', strtotime($row['mulai'])); }}" data-selesai="{{ $newDate = date('Y-m-d\TH:i', strtotime($row['selesai'])); }}" data-id="{{ $row['id_pengemasanbatchproduk'] }}">edit</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="editkemasbatch" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            Entry Pengemasan Batch
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p class="statusMsg"></p>
                        <form method="post" action="edit_pengemasanbatchproduk" id='forminput1'>
                            <input type="hidden" name="id" id="isi_kemasid">
                            <div class="card mb-4">
                                <div class="card-header" id='headertgl'></div>
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Pengemasan Batch
                                </div>
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                            Produk</label>
                                        <div class="col-sm">
                                            <input class="form-control 1" list="listnamaproduk" type="text" name='nama_produk' id="editnamaproduk">
                                            </input>
                                            <datalist id='listnamaproduk'>
                                                @foreach ($produk as $row)
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
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                            Batch</label>
                                        <div class="col-sm">
                                            <input type="text" name="no_batch" class="form-control 1" id="isi_nobatch" placeholder="No Batch" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                                            PROTAP</label>
                                        <div class="col-sm">
                                            <input type="text" name="protap" class="form-control 1" id="isi_protap" placeholder="Sesuai PROTAP" />
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
                                            <input type="text" name="bentuk_sediaan" class="form-control 1" id="isi_bentuk" placeholder="Bentuk Sediaan" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kemasan</label>
                                        <div class="col-sm">
                                            <input type="text" list="kemasan" style="height: 35px;" name="kemasan" class="form-control 1" id="isi_kemasan">
                                            </input>
                                            <datalist id="kemasan">
                                                @foreach ($kemasan as $row)
                                                <option value="{{ $row['kemasan_nama'] }}">
                                                    {{ $row['kemasan_nama'] }}
                                                </option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                    </div>


                                </div>


                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai</label>
                                        <div class="col-sm">
                                            <input type="datetime-local" name="mulai" class="form-control 1" id="isi_mulai" placeholder="Tipe/Merek" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">selesai</label>
                                        <div class="col-sm">
                                            <input type="datetime-local" name="selesai" class="form-control 1" id="isi_selesai" placeholder="Tipe/Merek" />
                                        </div>
                                    </div>

                                </div>
                                <a class="btn btn-primary" onclick="salert1(1)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">
                                    Simpan</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script>
        $(document).on('click', "#klik_kemas", function() {
            var nama = $(this).data('nama');
            var kode = $(this).data('kode');
            var nobatch = $(this).data('nobatch');
            var besar = $(this).data('besar');
            var bentuk = $(this).data('bentuk');
            var kategori = $(this).data('kategori');
            var kemasan = $(this).data('kemasan');
            var protap = $(this).data('protap');
            var mulai = $(this).data('mulai');
            var selesai = $(this).data('selesai');
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
            $("#isi_mulai").val(mulai);
            $("#isi_selesai").val(selesai);
            $("#isi_kemasid").val(id);

            // document.getElementById('cpbahan').value = cpid;
        })
        const produks = JSON.parse('<?= json_encode($produk) ?>')
        $("#namaproduk").change(function() {
            console.log('halo');
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
            console.log('halo');
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
    @endsection
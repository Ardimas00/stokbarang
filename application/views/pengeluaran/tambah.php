<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- load sidebar -->
        <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" data-url="<?= base_url('pengeluaran') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('partials/topbar.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('pengeluaran') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                                <div class="card-body">
                                    <form action="<?= base_url('pengeluaran/proses_tambah') ?>" id="form-tambah" method="POST">
                                        <h5>Data Petugas</h5>
                                        <hr>
                                        <div class="form-row">
                                            <div class="form-group col-2">
                                                <label>No. Keluar</label>
                                                <input type="text" name="no_keluar" value="TR<?= time() ?>" readonly class="form-control">
                                            </div>
                                            <div class="form-group col-3">
                                                <label>Kode Petugas</label>
                                                <input type="text" name="kode_petugas" value="<?= $this->session->login['kode'] ?>" readonly class="form-control">
                                            </div>
                                            <div class="form-group col-3">
                                                <label>Nama Petugas</label>
                                                <input type="text" name="nama_petugas" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
                                            </div>
                                            <div class="form-group col-2">
                                                <label>Tanggal Keluar</label>
                                                <input type="text" name="tgl_keluar" value="<?= date('d/m/Y') ?>" readonly class="form-control">
                                            </div>
                                            <div class="form-group col-2">
                                                <label>Jam</label>
                                                <input type="text" name="jam_keluar" value="<?= date('H:i:s') ?>" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>Data Customer</h5>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-10">
                                                        <label for="nama_customer">Nama Pengambil</label>
                                                        <select name="nama_customer" id="nama_customer" class="form-control">
                                                            <option value="">Pilih Pengambil</option>
                                                            <?php foreach ($all_customer as $customer): ?>
                                                                <option value="<?= $customer->nama ?>"><?= $customer->nama ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <label for="">&nbsp;</label>
                                                        <button disabled type="button" class="btn btn-danger btn-block" id="reset"><i class="fa fa-times"></i></button>
                                                    </div>
                                                    <input type="hidden" name="nama_customer_hidden" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h5>Data Barang</h5>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-4">
                                                        <label for="nama_barang">Nama Barang</label>
                                                        <select name="nama_barang" id="nama_barang" class="form-control">
                                                            <option value="">Pilih Barang</option>
                                                            <?php foreach ($all_barang as $barang): ?>
                                                                <option value="<?= $barang->nama_barang ?>" data-kode="<?= $barang->kode_barang ?>" data-satuan="<?= $barang->satuan ?>"><?= $barang->nama_barang ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <label>Kode Barang</label>
                                                        <input type="text" name="kode_barang" value="" readonly class="form-control">
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <label>Jumlah</label>
                                                        <input type="number" name="jumlah" value="" class="form-control" min="1">
                                                    </div>
                                                    <div class="form-group col-3">
                                                        <label>Keterangan</label>
                                                        <input type="text" name="keterangan" value="" class="form-control">
                                                    </div>
                                                    <div class="form-group col-1">
                                                        <label for="">&nbsp;</label>
                                                        <button type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                    <input type="hidden" name="satuan" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="keranjang">
                                            <h5>Detail Pengeluaran</h5>
                                            <hr>
                                            <table class="table table-bordered" id="keranjang">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Nama Barang</td>
                                                        <td width="15%">Kode Barang</td>
                                                        <td width="15%">Jumlah</td>
                                                        <td width="10%">Satuan</td>
                                                        <td width="15%">Keterangan</td>
                                                        <td width="10%">Aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="6" align="center">
                                                            <input type="hidden" name="max_hidden" value="">
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </form>
                                </div>              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- load footer -->
            <?php $this->load->view('partials/footer.php') ?>
        </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
    <script>
    $(document).ready(function(){
        $('tfoot').hide();

        $(document).keypress(function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
        });

        $('#nama_customer').on('change', function(){
            $(this).prop('disabled', true);
            $('#reset').prop('disabled', false);
            $('input[name="nama_customer_hidden"]').val($(this).val());
        });

        $(document).on('click', '#reset', function(){
            $('#nama_customer').val('');
            $('#nama_customer').prop('disabled', false);
            $(this).prop('disabled', true);
            $('input[name="nama_customer_hidden"]').val('');
        });

        $('#nama_barang').on('change', function(){
            if ($(this).val() == '') {
                resetForm();
            } else {
                const selectedBarang = $(this).val();
                const kodeBarang = $('option:selected', this).data('kode');

                $('input[name="kode_barang"]').val(kodeBarang);

                // Set satuan based on selected barang
                const selectedOption = $(this).find(':selected');
                $('input[name="satuan"]').val(selectedOption.data('satuan'));
            }
        });

        $(document).on('click', '#tambah', function(){
            const url = $('#content').data('url') + '/keranjang_barang';
            const data = {
                nama_barang: $('select[name="nama_barang"]').val(),
                kode_barang: $('input[name="kode_barang"]').val(),
                jumlah: $('input[name="jumlah"]').val(),
                satuan: $('input[name="satuan"]').val(),
                keterangan: $('input[name="keterangan"]').val(),
            };

            // Validasi input
            if (!data.nama_barang || !data.kode_barang || !data.jumlah) {
                alert('Semua field harus diisi!');
                return;
            }

            // Perform AJAX request to add item to keranjang
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response){
                    if ($('select[name="nama_barang"]').val() == data.nama_barang) {
                        $('option[value="' + data.nama_barang + '"]').hide();
                    }
                    resetForm();

                    // Append item to keranjang table
                    $('table#keranjang tbody').append(response);
                    $('tfoot').show();
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });

        $(document).on('click', '#tombol-hapus', function(){
            $(this).closest('.row-keranjang').remove();

            $('option[value="' + $(this).data('nama-barang') + '"]').show();

            if ($('tbody').children().length == 0) {
                $('tfoot').hide();
            }
        });

        $('button[type="submit"]').on('click', function(){
            $('input[name="kode_barang"]').prop('disabled', true);
            $('select[name="nama_barang"]').prop('disabled', true);
            $('input[name="satuan"]').prop('disabled', true);
            $('input[name="keterangan"]').prop('disabled', true);
            $('input[name="jumlah"]').prop('disabled', true);
        });

        function resetForm(){
            $('#nama_barang').val('');
            $('input[name="kode_barang"]').val('');
            $('input[name="jumlah"]').val('');
            $('input[name="jumlah"]').prop('readonly', true);
            $('button#tambah').prop('disabled', true);
        }
    });
</script>
</body>
</html>
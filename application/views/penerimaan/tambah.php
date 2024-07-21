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
        <div id="content" data-url="<?= base_url('penerimaan') ?>">
            <!-- load Topbar -->
            <?php $this->load->view('partials/topbar.php') ?>

            <div class="container-fluid">
                <div class="clearfix">
                    <div class="float-left">
                        <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
                    </div>
                    <div class="float-right">
                        <a href="<?= base_url('penerimaan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                            <div class="card-body">
                                <form action="<?= base_url('penerimaan/proses_tambah') ?>" id="form-tambah" method="POST">
                                    <h5>Data Petugas</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-2">
                                            <label>No. Terima</label>
                                            <input type="text" name="no_terima" value="TR<?= time() ?>" readonly class="form-control">
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
                                            <label>Tanggal Terima</label>
                                            <input type="text" name="tgl_terima" value="<?= date('d/m/Y') ?>" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Jam</label>
                                            <input type="text" name="jam_terima" value="<?= date('H:i:s') ?>" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>Data Supplier</h5>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-10">
                                                    <label for="nama_supplier">Nama Supplier</label>
                                                    <select name="nama_supplier" id="nama_supplier" class="form-control">
                                                        <option value="">Pilih Supplier</option>
                                                        <?php foreach ($all_supplier as $supplier): ?>
                                                            <option value="<?= $supplier->nama ?>"><?= $supplier->nama ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-2">
                                                    <label for="">&nbsp;</label>
                                                    <button disabled type="button" class="btn btn-danger btn-block" id="reset"><i class="fa fa-times"></i></button>
                                                </div>
                                                <input type="hidden" name="nama_supplier_hidden" value="">
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
                                                            <option value="<?= $barang->nama_barang ?>" data-kode="<?= $barang->kode_barang ?>"><?= $barang->nama_barang ?></option>
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
                                        <h5>Detail Penerimaan</h5>
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

        // Prevent form submission on Enter key
        $(document).keypress(function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
        });

        // Update kode_barang and satuan fields on nama_barang change
        $('#nama_barang').on('change', function(){
            if ($(this).val() == '') {
                resetForm();
            } else {
                const selectedBarang = $(this).val();
                const kodeBarang = $('option:selected', this).data('kode');

                $('input[name="kode_barang"]').val(kodeBarang);

                // Set satuan based on selected barang (to be saved to database)
                const selectedOption = $(this).find(':selected');
                $('input[name="satuan"]').val(selectedOption.data('satuan'));
            }
        });

        // Add item to keranjang
        $(document).on('click', '#tambah', function(){
            const url = $('#content').data('url') + '/keranjang_barang';
            const data = {
                nama_barang: $('select[name="nama_barang"]').val(),
                kode_barang: $('input[name="kode_barang"]').val(),
                jumlah: $('input[name="jumlah"]').val(),
                satuan: $('input[name="satuan"]').val(),
                keterangan: $('input[name="keterangan"]').val(),
            };

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

                    // Update total calculation (if needed)
                    $('#total').html('<strong>' + calculateTotal() + '</strong>');
                    $('input[name="total_hidden"]').val(calculateTotal());
                }
            });
        });

        // Function to calculate total
        function calculateTotal(){
            let total = 0;
            $('.sub_total').each(function(){
                total += parseInt($(this).text());
            });
            return total;
        }

        // Reset form fields
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

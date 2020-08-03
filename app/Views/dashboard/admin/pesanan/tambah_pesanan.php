<?= $this->extend('layouts/main_dashboard') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('outCSS') ?>

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<?= $this->endSection() ?>

<?= $this->section('pageName') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<li class="breadcrumb-item"><a href="#"><?= APP_NAME ?></a></li>
<li class="breadcrumb-item"><a href="javascript: void(0);">Pesanan</a></li>
<li class="breadcrumb-item active">Tambah Pesanan</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Tambahkan Pesanan</h4>
                <p class="card-title-desc">Menambahkan data Pesanan ke Toko.</p>
                <form action="<?= base_url('admin/tambah_pesanan') ?>" method="POST">
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Pembeli</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" required name="nama" >
                    </div>
                </div>
<!--                <div class="form-group row">-->
<!--                    <label for="example-text-input" class="col-md-2 col-form-label">Email Pembeli</label>-->
<!--                    <div class="col-md-10">-->
<!--                        <input class="form-control" type="text" required name="email" >-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group row">
									<label class="col-md-2 col-form-label">Provinsi</label>
									<div class="col-md-10">
										<select class="form-control" id="provinsi" required name="provinsi">
                      <?php foreach ($provinsi->rajaongkir->results as $prov): ?>
												<option data-id_prov="<?= $prov->province_id ?>" value="<?= $prov->province ?>"><?= $prov->province ?></option>
                      <?php endforeach; ?>
										</select>
									</div>
                </div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Kabupaten</label>
										<div class="col-md-10">
											<select class="form-control" id="kabupaten" required name="kabupaten">

											</select>
										</div>
									</div>
								<div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Kecamatan</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" required name="kecamatan" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Alamat (Kelurahan, Desa/Dusun, RT/RW/Nomer Rumah, Kode Pos)</label>
                    <div class="col-md-10">
                        <textarea class="form-control" type="text" required name="alamat" > </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nomer Telefon</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" required name="phone">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Metode Pembayaran</label>
                    <div class="col-md-10">
                        <select class="form-control" required name="bayar" readonly>
                            <option value="CASH" selected>Bayar Cash</option>
                        </select>
                    </div>
                </div>
								<div class="form-group row">
									<label class="col-md-2 col-form-label">Kurir</label>
									<div class="col-md-10">
										<select class="form-control" required name="kurir" id="kurir">
											<option value="jne" selected>JNE</option>
											<option value="tiki">TIKI</option>
											<option value="pos">POS Indonesia</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-2 col-form-label">Service</label>
									<div class="col-md-10">
										<select class="form-control" required name="service" id="service" required>

										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-md-2 col-form-label">Total Berat (Gram)</label>
									<div class="col-md-10">
										<input class="form-control" type="text" required readonly value="<?= $berat ?>" id="berat">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-md-2 col-form-label">Estimasi</label>
									<div class="col-md-10">
										<input class="form-control" type="text" required name="estimasi" id="estimasi" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-md-2 col-form-label">Biaya Kirim</label>
									<div class="col-md-10">
										<input class="form-control" type="text" required id="ongkir_display" readonly>
										<input class="form-control" type="text" id="ongkir" required name="ongkir" hidden>
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-md-2 col-form-label">Total Harga Barang</label>
									<div class="col-md-10">
										<input id="harga_display" class="form-control" value="Rp <?= number_format($cart_total_bayar, 0, ',', '.') ?>" type="text" name="" readonly>
										<input class="form-control" value="<?= $cart_total_bayar ?>" type="number" id="harga" required hidden name="harga">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-text-input" class="col-md-2 col-form-label">Total Bayar</label>
									<div class="col-md-10">
										<input id="total_bayar_display" class="form-control" value="" type="text" name="" readonly>
									</div>
								</div>
                <div class="form-group d-flex justify-content-center">
                  <button type="submit" name="submit" class="btn btn-primary mt-3 mt-sm-0">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List Produk</h4>
                <p class="card-title-desc">Menampilkan produk yang akan dibeli.</p>    
                
                <div class="table-responsive">
                    <table class="table table-hover mb-0">

                        <thead>
                            <tr>
                                <th>Nama Payung</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Sub Total</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if($cart != null): foreach($cart as $c): ?>
                            <tr>
                                <td><?= $c['name'] ?></td>
                                <td><?= $c['qty'] ?></td>
                                <td>Rp <?= number_format((int) $c['price'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format((int) $c['price'] * $c['qty'], 0, ',', '.') ?></td>
                                <td class="text-center">
                                    <div class="button-items">
                                        <a class="btn btn-danger" href="<?= base_url('admin/hapus_item/'.$c['rowid']) ?>" 
                                            onclick="return confirm('Yakin ingin menghapus pesanan ini ?');"
                                            role="button">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('outJS') ?>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
      $(document).ready(function() {
          const kabupaten = $('#kabupaten');
          const provinsi = $('#provinsi');
          const services = $('#service');
          const ongkir = $('#ongkir');
          const estimasi = $('#estimasi');
          const ongkir_display = $('#ongkir_display');
          $(kabupaten).select2();

          const BASE_URL = "<?php echo base_url() ?>";
          let berat = $('#berat');
          let city_id = kabupaten;
          let kurir = $('#kurir');

          $(kabupaten).select2();
          getKabupatenByIDProv()
          setTimeout(function(){  onLoadGetRajaOngkir();  }, 3000);

          $(kurir).on('change', function () {
              console.log('kurir changed')
              onLoadGetRajaOngkir()
              console.log(kurir.val())
          })

          $(services).on('change', function () {
              console.log('services changed')
              $(ongkir).val(parseInt($(services).find(':selected').data('harga')))
              $(estimasi).val($(services).find(':selected').data('est') + ' Hari')
              $(ongkir_display).attr("placeholder", 'Rp ' + formatMoney($(services).find(':selected').data('harga')))
              $('#total_bayar_display').attr("placeholder", 'Rp ' + formatMoney(parseInt($(services).find(':selected').data('harga')) + parseInt($('#harga').val())))
              console.log(services.val())
          })

          $(kabupaten).on('change', function () {
              console.log('kabupaten changed')
              onLoadGetRajaOngkir()
              console.log(kabupaten.val())
          })

          $(provinsi).on('change', function () {
              console.log('provinsi changed')
              $(kabupaten).children('option').remove();
              getKabupatenByIDProv();
              setTimeout(function(){  onLoadGetRajaOngkir();  }, 3000);
              console.log(provinsi.val())
          })

          $(provinsi).on('change', function () {
              getKabupatenByIDProv()
          })

          function getKabupatenByIDProv() {
              $('#kabupaten :nth-child(1)').prop('selected', true);
              $.ajax({
                  url: BASE_URL + '/auth/getKabupatenRO/'+ provinsi.find(':selected').data('id_prov'),
                  dataType: "json",
                  success: function(result) {
                      $(kabupaten).children('option').remove();
                      $('#kabupaten :nth-child(1)').prop('selected', true);
                      $(kabupaten).append(result.rajaongkir.results.map(function (sObj) {
                          return '<option data-city_id="'+ sObj.city_id +'" value="' +
                              sObj.city_name + '">' +
                              sObj.city_name + '</option>'
                      }));
                  }
              });
          }

          function onLoadGetRajaOngkir()
          {
              $('#kabupaten :nth-child(1)').prop('selected', true);
              console.log($('#kabupaten').val())
              $.ajax({
                  url: BASE_URL + '/home/getCostRajaOngkir/'+ city_id.find(':selected').data('city_id') +'/'+berat.val()+'/'+kurir.val(),
                  dataType: "json",
                  success: function(result) {
                      console.log(result);
                      console.log(kurir.val())
                      $(services).children('option').remove();

                      $(services).append(result.rajaongkir.results[0].costs.map(function (sObj) {
                          return '<option data-harga="' +
                              sObj.cost.map(a => a.value) + '" data-est="' +
                              sObj.cost.map(a => a.etd) + '" value="' +
                              sObj.service + '">' +
                              sObj.service + '</option>'
                      }));
                      $('#service :nth-child(1)').prop('selected', true);
                      $('#kabupaten :nth-child(1)').prop('selected', true);
                      // $('#ROest').text('Estimasi ' + $(services).find(':selected').data('est') + ' Hari')
                      $(ongkir).val(parseInt($(services).find(':selected').data('harga')))
                      $(estimasi).val($(services).find(':selected').data('est') + ' Hari')
                      $(ongkir_display).attr("placeholder", 'Rp ' + formatMoney($(services).find(':selected').data('harga')))
                      $('#total_bayar_display').attr("placeholder", 'Rp ' + formatMoney(parseInt($(services).find(':selected').data('harga')) + parseInt($('#harga').val())))
                  }
              });
          }

          function formatMoney(amount, decimalCount = 0, decimal = ".", thousands = ".") {
              try {
                  decimalCount = Math.abs(decimalCount);
                  decimalCount = isNaN(decimalCount) ? 0 : decimalCount;

                  const negativeSign = amount < 0 ? "-" : "";

                  let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
                  let j = (i.length > 3) ? i.length % 3 : 0;

                  return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
              } catch (e) {
                  console.log(e)
              }
          }
      });
	</script>

<?= $this->endsection() ?>
<?= $this->extend('layouts/main_home') ?>  

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('outCSS') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3><b>Detail Pesanan</b></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <ul class="list-group">
            <?php foreach($cart as $c): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center"> <?= $c['name'] ?> <small><i>Rp <?= number_format($c['price'], 0, ',', '.') ?></i></small> <span class="badge badge-primary badge-pill" contenteditable="true"><?= $c['qty'] ?></span>
             <a href="<?= base_url('home/hapus_item/'.$c['rowid']) ?>"><b>Hapus</b></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-md-4">
          <form class="" action="<?= route_to('payment_action') ?>" method="POST">
						<input type="number" name="ongkir" id="ongkir" value="" hidden>
            <input type="number" class="form-check-input" value="" hidden name="supplier">
            <div class="form-group">
            <label>Alamat Pengiriman (Kelurahan, Desa/Dusun, RT/RW atau Nomer Rumah, Kode Pos)</label>
              <textarea name="alamat" type="text" required class="form-control"><?= $data_pribadi['user_alamat'] ?></textarea>
            </div>
            <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="sel1">Kurir</label>
									<select class="form-control" name="kurir" id="kurir" required>
										<option value="jne">JNE</option>
										<option value="tiki">TIKI</option>
										<option value="pos">POS Indonesia</option>
									</select>
								</div>
							</div>
            </div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="sel1">Service</label>
									<select class="form-control" name="service" id="service" required>
									</select>
								</div>
							</div>
            </div>
          <div class="form-group"> <label>Total Berat Barang (Gram)</label> <input type="number" name="berat" id="berat" value="<?= $totalBerat; ?>" class="form-control" placeholder="<?= $totalBerat; ?> Gram" readonly=""> </div>
          <div class="form-group"> <label>Total Ongkos Kirim</label> <input type="text" id="ongkir_display" name="ongkir_display" class="form-control" placeholder="Cek Ongkir dulu!" required readonly=""> </div>
          <div class="form-group"> <label>Total Harga Barang</label> <input type="text" class="form-control" placeholder="Rp <?= number_format($total, 0, ',', '.') ?>" readonly=""> </div>
        </div>
        <div class="col-md-4">
					<div class="form-group">
						<label for="sel1">Estimasi Pengiriman :</label>
						<input type="text" class="form-control" id="estimasi" name="estimasi" value="" placeholder="" required readonly>
					</div>
            <div class="form-group">
              <label for="sel1">Provinsi Pengiriman :</label>
							<select required name="provinsi" class="form-control" id="provinsi">
                <?php foreach ($provinsi->rajaongkir->results as $prov): ?>
									<option data-id_prov="<?= $prov->province_id ?>" value="<?= $prov->province ?>" <?= ($prov->province == $data_pribadi['user_provinsi'])? 'selected' : '' ; ?>><?= $prov->province ?></option>
                <?php endforeach; ?>
							</select>
            </div>
						<div class="form-group">
              <label for="sel1">Kabupaten Pengiriman :</label>
							<select required name="kabupaten" class="form-control" id="kabupaten">
                <?php foreach ($kabupaten->rajaongkir->results as $kab): ?>
									<option data-city_id="<?= $kab->city_id ?>" value="<?= $kab->city_name ?>" <?= ($kab->city_name == $data_pribadi['user_kabupaten'])? 'selected' : '' ; ?>><?= $kab->city_name ?></option>
                <?php endforeach; ?>
							</select>
            </div>
						<div class="form-group">
              <label for="sel1">Kecamatan Pengiriman :</label>
							<input type="text" class="form-control" name="kecamatan" value="<?= $data_pribadi['user_kecamatan'] ?>" placeholder="Masukkan kecamatan" required>
            </div>
						<div class="form-group">
              <label for="sel1">Metode Pembayaran :</label>
              <select class="form-control" name="bayar" id="sel1">
                <option value="BRI">Bank BRI</option>
                <option value="CASH">Uang Cash</option>
              </select>
            </div>
            <div class="form-group"> <label>Nomer Telefon</label> <input type="text" name="phone" value="<?= $data_pribadi['user_nomer_hp'] ?>" required class="form-control"></div>
            <div class="row">
              <div class="col-md-12 d-flex justify-content-center">
								<button type="button" id="btn_cek_ongkir" class="btn btn-warning mr-2">Cek Ongkir</button>
								<button type="submit" name="submit" class="btn btn-success">Pesan Sekarang</button>
							</div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4 class=""><b>Informasi</b>&nbsp;<span class="badge badge-pill badge-warning">!</span></h4>
          <p class="">Nomer Rekening BRI : <b>0943-2787-6456-3454 </b><br>
          Jika Metode Pembayaran Uang Cash, maka pembayaran dilakukan langsung ke Toko.<br>
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

        getKabupatenByIDProv();
        setTimeout(function(){  onLoadGetRajaOngkir();  }, 3000);


        $('#btn_cek_ongkir').click(function () {
            console.log('Btn clicked')
            console.log(BASE_URL)
            console.log(BASE_URL + '/home/getCostRajaOngkir/'+ city_id.find(':selected').data('city_id') +'/'+berat.val()+'/'+kurir.val())
					$.ajax({
							url: BASE_URL + '/home/getCostRajaOngkir/'+ city_id.find(':selected').data('city_id') +'/'+berat.val()+'/'+kurir.val(),
              dataType: "json",
							success: function(result) {
									console.log(result);
                  $(services).children('option').remove();

                  $(services).append(result.rajaongkir.results[0].costs.map(function (sObj) {
                      return '<option data-harga="' +
                          sObj.cost.map(a => a.value) + '" data-est="' +
                          sObj.cost.map(a => a.etd) + '" value="' +
                          sObj.service + '">' +
                          sObj.service + '</option>'
                  }));
                  $('#service :nth-child(1)').prop('selected', true);
                  // $('#ROest').text('Estimasi ' + $(services).find(':selected').data('est') + ' Hari')
                  $(ongkir).val(parseInt($(services).find(':selected').data('harga')))
                  $(estimasi).val($(services).find(':selected').data('est') + ' Hari')
                  $(ongkir_display).attr("placeholder", 'Rp ' + formatMoney($(services).find(':selected').data('harga')))
							}
					});
        })

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

        function onLoadGetRajaOngkir()
				{
            $('#kabupaten :nth-child(1)').prop('selected', true);
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
                }
            });
				}

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
    });
</script>
<?= $this->endSection() ?>

<div class="container">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Report
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Progress Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">

<h1 class="display-4 text-center"><hr>User<hr></h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Nama</th>
            <th>Privilege</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->db->get('user')->result() as $user) {
            ?>
            <tr>
                <td><?php echo $user->username?></td>
                <td><?php echo $user->email?></td>
                <td><?php echo $user->nama?></td>
                <td><?php echo $user->privilege?></td>
            </tr>
        <?php }?>
    </tbody>
</table>
<hr>
<br>

<h1 class="display-4 text-center"><hr>Pesanan<hr></h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Nama Pesanan</th>
            <th>Nama Pemesan</th>
            <th>Tanggal Pemesanan</th>
            <th>Tipe</th>
            <th>Bahan</th>
            <th>Ukuran</th>
            <th>Penjahit</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->db->get('pesanan')->result() as $pesanan) {
            if ($pesanan->penjahit_id == null) {
                $namaPenjahit = "-";
            } else {
                foreach ($this->db->get_where('user', array('id' => $pesanan->penjahit_id))->result() as $penjahit) {
                    $namaPenjahit = $penjahit->nama;
                }
            }
            foreach ($this->db->get_where('user', array('id' => $pesanan->pelanggan_id))->result() as $pelanggan) {
                $namaPelanggan = $pelanggan->nama;
            }
            foreach ($this->db->get_where('bahan', array('id' => $pesanan->bahan_id))->result() as $bahan) {
                $namaBahan = $bahan->nama;
            }
            ?>
            <tr>
                <td><?php echo $pesanan->nama?></td>
                <td><?php echo $namaPelanggan?></td>
                <td><?php echo $pesanan->tanggal?></td>
                <td><?php echo $pesanan->tipe?></td>
                <td><?php echo $namaBahan?></td>
                <td><?php echo $pesanan->ukuran?></td>
                <td><?php echo $namaPenjahit?></td>
                <td><?php echo $pesanan->status?></td>
            </tr>
        <?php }?>
    </tbody>
</table>
<hr>
<br>

<h1 class="display-4 text-center"><hr>Resi<hr></h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Tanggal Resi Dibentuk</th>
            <th>Pelanggan</th>
            <th>Penjhit</th>
            <th>Kasir</th>
            <th>Pesanan</th>
            <th>Pakaian</th>
            <th>Total Item</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->db->get('resi')->result() as $resi) {
            if ($resi->penjahit_id == null) {
                $namaPenjahit = "-";
            } else {
                foreach ($this->db->get_where('user', array('id' => $resi->penjahit_id))->result() as $penjahit) {
                    $namaPenjahit = $penjahit->nama;
                }
            }
            if ($resi->pesanan_id == null) {
                $namaPesanan = "-";
            } else {
                foreach ($this->db->get_where('pesanan', array('id' => $resi->pesanan_id))->result() as $pesanan) {
                    $namaPesanan = $penjahit->nama;
                }
            }
            if ($resi->pakaian_id == null) {
                $namaPakaian = "-";
            } else {
                foreach ($this->db->get_where('user', array('id' => $resi->pakaian_id))->result() as $pakaian) {
                    $namaPakaian = $pakaian->nama;
                }
            }
            if ($resi->kasir_id == null) {
                $namaKasir = "-";
            } else {
                foreach ($this->db->get_where('user', array('id' => $resi->kasir_id))->result() as $kasir) {
                    $namaKasir = $kasir->nama;
                }
            }
            foreach ($this->db->get_where('user', array('id' => $resi->pelanggan_id))->result() as $pelanggan) {
                $namaPelanggan = $pelanggan->nama;
            }
            ?>
            <tr>
                <td><?php echo $resi->tanggal?></td>
                <td><?php echo $namaPelanggan?></td>
                <td><?php echo $namaPenjahit?></td>
                <td><?php echo $namaKasir?></td>
                <td><?php echo $namaPesanan?></td>
                <td><?php echo $namaPakaian?></td>
                <td><?php echo $resi->total?></td>
                <td><?php echo $resi->harga?></td>
                <td><?php echo $resi->status?></td>
            </tr>
        <?php }?>
    </tbody>
</table>
<hr>
<br>

<h1 class="display-4 text-center"><hr>Bahan<hr></h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Nama</th>
            <th>Spesifikasi</th>
            <th>Harga</th>
            <th>Kuantitas</th>
            <th>Supplier</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->db->get('bahan')->result() as $bahan) {
            foreach ($this->db->get_where('user', array('id' => $bahan->supplier_id))->result() as $supplier) {
                $namaSupplier = $supplier->nama;
            }
            ?>
            <tr>
                <td><?php echo $bahan->nama?></td>
                <td><?php echo $bahan->spesifikasi?></td>
                <td><?php echo $bahan->harga?></td>
                <td><?php echo $bahan->kuantitas?></td>
                <td><?php echo $namaSupplier?></td>
            </tr>
        <?php }?>
    </tbody>
</table>
<hr>
<br>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Print</button>
      </div>
    </div>
  </div>
</div>
</div>
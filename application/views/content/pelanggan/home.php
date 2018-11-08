<div class="container">
    <div class="row">
    <?php 
    $pesanan = $this->db->get('pesanan')->result();
    if ($this->db->get('pesanan')->num_rows() == 0) {
        ?>
        <p class="text-center display-4">Saat ini belum ada pesanan pelanggan :(</p>
        <?php
    }
    foreach ($pesanan as $post) {
        foreach ($this->db->get_where('bahan', array('id' => $post->bahan_id))->result() as $parseBahan) {
            $namaBahan = $parseBahan->nama;
        }
        foreach ($this->db->get_where('user', array('id' => $post->pelanggan_id))->result() as $parsePelanggan) {
            $namaPelanggan = $parsePelanggan->nama;
        }
    ?>
        <div class="col" style="padding-top: 25px">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('/assets/images/uploads/pesanan/')?><?php echo $post->gambar?>" alt="Card image cap">
                <div class="card-header" type="button" data-toggle="collapse" data-target="#detail<?php echo $post->id?>">
                    <h5 class="card-title"><?php echo $post->nama;?></h5>
                    <span class="text-muted"><?php echo $namaPelanggan?></span>
                </div>
                <div class="collapse" id="detail<?php echo $post->id?>" style="position: absolute; background: rgba(0,0,0,0.75); width: 100%; height: 100%">
                <div class="card-body" >
                    <ul class="list-group list-group-flush">
                        <div class="card-header">
                            <h5 class="card-title text-center text-light">Detil</h5>
                        </div>
                        <li class="list-group-item" style="background: rgba(0,0,0,0.75); color: white;"><strong>Tipe:   </strong><?php echo $post->tipe?></li>
                        <li class="list-group-item" style="background: rgba(0,0,0,0.75); color: white;"><strong>Bahan:  </strong><?php echo $namaBahan?></li>
                        <li class="list-group-item" style="background: rgba(0,0,0,0.75); color: white;"><strong>Ukuran: </strong><?php echo $post->ukuran?></li>
                        <li class="list-group-item" style="background: rgba(0,0,0,0.75); color: white;"><strong>Status: </strong><?php echo $post->status?></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>

    <?php }?>
    </div>
</div>

<button type="button" style="position: fixed; right: 15px; bottom: 15px; z-index: 5" class="floating btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Pesan Item
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <?php echo form_open_multipart('pelanggan/uploadPesanan'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesanan baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
            <label for="nama">Nama Pesanan</label>
            <input type="text" class="form-control" required id="nama" name="nama" placeholder="Baju Kemeja Keren">
            </div>
            <div class="form-group">
            <label for="bahan">Bahan</label>
            <select class="form-control" id="bahan" name="bahan" required>
            <?php $listBahan = $this->db->get('bahan')->result();
                foreach ($listBahan as $bahan) {
                    ?>
                    <option value="<?php echo $bahan->id?>"><?php echo $bahan->nama?></option>
                    <?php
                }
            ?>
            </select>
            </div>
            <div class="form-group">
            <label for="tipe">Tipe Bahan</label>
            <select class="form-control" id="tipe" name="tipe" required>
                <option value="Kaus">Kaus</option>
                <option value="Kemeja">Kemeja</option>
                <option value="Jaket">Jaket</option>
                <option value="Jas">Jas</option>
            </select>
            </div>
            <div class="form-group">
            <label for="ukuran">Ukuran</label>
            <select multiple class="form-control" id="ukuran" name="ukuran" required>
            <option value="XS">XS</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            </select>
            </div>
            <div class="form-group">
            <label for="nama">Jumlah</label>
            <input type="number" value="1" min="1" required class="form-control" id="jumlah" name="jumlah" placeholder="name@example.com">
            </div>
            <div class="input-group">
            <div class="custom-file">
            <input type="file" class="custom-file-input" required name="image" id="fileInput" aria-describedby="inputGroupFileAddon04">
            <label class="custom-file-label" for="fileInput">Choose file</label>
            </div>
            </div>

        </form>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </div>
  </div>
</div>
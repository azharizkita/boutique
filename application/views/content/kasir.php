<div class="container">
    <div class="row">
    <?php 
        if ($this->db->get('resi')->num_rows() == 0) {
            ?>
            <p class="text-center display-4">Saat ini belum ada resi tercetak :(</p>
            <?php
        }
    foreach ($this->db->get('resi')->result() as $post) {
        if ($this->db->get_where('user', array('id' => $post->penjahit_id))->num_rows() == 0) {
            $namaPenjahit = "-";
        } else {
            foreach ($this->db->get_where('user', array('id' => $post->penjahit_id))->result() as $parsePenjahit) {
                $namaPenjahit = $parsePenjahit->nama;
            }
        }
        
        if ($this->db->get_where('user', array('id' => $post->pelanggan_id))->num_rows() == 0) {
            $namaUser = "-";
        } else {
            foreach ($this->db->get_where('user', array('id' => $post->pelanggan_id))->result() as $parseUser) {
                $namaUser = $parseUser->nama;
            }
        }       

        if ($this->db->get_where('user', array('id' => $post->kasir_id))->num_rows() == 0) {
            $namaKasir = "-";
        } else {
            foreach ($this->db->get_where('user', array('id' => $post->kasir_id))->result() as $parseKasir) {
                $namaKasir = $parseKasir->nama;
            }
        }

        if ($this->db->get_where('user', array('id' => $post->kasir_id))->num_rows() == 0) {
            $namaPesanan = "-";
        } else {
            foreach ($this->db->get_where('pesanan', array('id' => $post->pesanan_id))->result() as $parsePesanan) {
                $namaPesanan = $parsePesanan->nama;
            }
        }
    ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $namaUser;?></h5>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Tanggal:   </strong><?php echo $post->tanggal?></li>
                        <li class="list-group-item"><strong>Pemesan:  </strong><?php echo $namaUser?></li>
                        <li class="list-group-item"><strong>Penjahit: </strong><?php echo $namaPenjahit?></li>
                        <li class="list-group-item"><strong>Kasir: </strong><?php echo $namaKasir?></li>
                        <li class="list-group-item"><strong>Pesanan: </strong><?php echo $namaPesanan?></li>
                        <li class="list-group-item"><strong>Total: </strong><?php echo $post->total?></li>
                        <li class="list-group-item"><strong>Harga: </strong><?php echo $post->harga?></li>
                        <?php if ($post->status == "To be accepted") {
                            ?>
                            <?php echo form_open_multipart('kasir/acceptPembayaran'); ?>
                            <input type="text" name="statusUp" value="Belum lunas" hidden>
                            <input type="text" name="id" value="<?php echo $post->id?>" hidden>
                            <li class="list-group-item"><button class="btn" type="submit" style="width: 100%">Cetak Resi</button></li>
                            </form>
                            <?php
                        }else{
                            ?>
                        <li class="list-group-item">

                            <?php if ($post->status == "Belum lunas") {
                                ?>
                        <?php echo form_open_multipart('kasir/updateStatusPembayaran'); ?>
                        <div class="input-group">
                        <select onchange="activate<?php echo $post->id;?>()" class="custom-select" id="inputGroupSelect04" name="status" aria-label="Example select with button addon">
                        <option disabled selected><?php echo $post->status?></option>
                        <option value="Lunas">Lunas</option>
                        </select>
                        <input type="text" name="id" value="<?php echo $post->id?>" hidden>
                        </form>
                        <div class="input-group-append">
                        <script type="text/javascript">
                        function activate<?php echo $post->id;?>() {
                            $("#commitButton<?php echo $post->id;?>").prop('disabled', false);
                        }
                        </script> 
                        <button class="btn btn-outline-secondary" id="commitButton<?php echo $post->id;?>" disabled type="submit">Commit</button>
                        </div>
                        </div>
                                <?php
                            } elseif ($post->status == "Lunas") {
                                ?>
                            <div class="text-center" style="color:green">Lunas</div>
                                <?php
                            }
                            ?>
                        </li>
                            <?php
                        }?>
                        
                        
                    </ul>
            </div>
        </div>

    <?php }?>
    </div>
</div>
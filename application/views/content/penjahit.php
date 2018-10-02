<div class="container">
    <div class="row">
    <?php 
    if ($this->db->get('pesanan')->num_rows() == 0) {
        ?>
        <p class="text-center display-4">Saat ini belum ada pesanan pelanggan :(</p>
        <?php
    }
    $pesanan = $this->db->get('pesanan')->result();
    foreach ($pesanan as $post) {
        foreach ($this->db->get_where('bahan', array('id' => $post->bahan_id))->result() as $parseBahan) {
            $namaBahan = $parseBahan->nama;
        }
        $this->db->get_where('bahan', array('id' => $post->bahan_id))->result();
    ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('/assets/images/uploads/pesanan/')?><?php echo $post->gambar?>" alt="Card image cap">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $post->nama;?></h5>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Tipe:   </strong><?php echo $post->tipe?></li>
                        <li class="list-group-item"><strong>Bahan:  </strong><?php echo $namaBahan?></li>
                        <li class="list-group-item"><strong>Ukuran: </strong><?php echo $post->ukuran?></li>
                        <li class="list-group-item">
                        <?php echo form_open_multipart('penjahit/updateStatusPesanan'); ?>
                        <div class="input-group">
                        <select onchange="activate<?php echo $post->id;?>()" class="custom-select" id="inputGroupSelect04" name="status" aria-label="Example select with button addon">
                        <option disabled selected><?php echo $post->status?></option>
                            <?php if ($post->status == "To be confirmed") {
                                ?>
                            <option value="Accepted">Accepted</option>
                            <option value="On progress">On progress</option>
                            <option value="Finished">Finished</option>
                                <?php
                            } elseif ($post->status == "Accepted") {
                                ?>
                            <option value="On progress">On progress</option>
                            <option value="Finished">Finished</option>
                                <?php
                            } elseif ($post->status == "On progress") {
                                ?>
                            <option value="Finished">Finished</option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="text" name="id" value="<?php echo $post->id?>" hidden>
                        <input type="text" name="jumlah" value="<?php echo $post->jumlah?>" hidden>
                        <input type="text" name="harga" value="<?php echo $post->harga?>" hidden>
                        <input type="text" name="pelanggan" value="<?php echo $post->pelanggan_id?>" hidden>
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
                        </li>
                    </ul>
            </div>
        </div>

    <?php }?>
    </div>
</div>
<div class="container">
    <div class="row">
    <?php 
    foreach ($this->db->get('bahan')->result() as $post) {
        foreach ($this->db->get_where('user', array('id' => $post->supplier_id))->result() as $parseUser) {
            $namaSupplier = $parseUser->nama;
        }
        // $this->db->get_where('bahan', array('id' => $post->bahan_id))->result();
    ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $post->nama;?></h5>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Spesifikasi:   </strong><?php echo $post->spesifikasi?></li>
                        <li class="list-group-item"><strong>Harga:  </strong><?php echo $post->harga?></li>
                        <li class="list-group-item"><strong>Kuantitas: </strong><?php echo $post->kuantitas?></li>
                        <li class="list-group-item"><strong>Supplier: </strong><?php echo $namaSupplier?></li>
                        <li class="list-group-item">
                        <?php echo form_open_multipart('supplier/addBahan'); ?>
                        <div class="input-group">
                        <input type="number" class="custom-select" name="kuantitas" value="0" min="1" onchange="activate<?php echo $post->id;?>()">
                        <input type="text" name="id" value="<?php echo $post->id?>" hidden>
                        <input type="text" name="kuantitasO" value="<?php echo $post->kuantitas?>" hidden>
                        </form>
                        <div class="input-group-append">
                        <script type="text/javascript">
                        function activate<?php echo $post->id;?>() {
                            $("#commitButton<?php echo $post->id;?>").prop('disabled', false);
                        }
                        </script> 
                        <button class="btn btn-outline-secondary" id="commitButton<?php echo $post->id;?>" disabled type="submit">Add</button>
                        </div>
                        </li>
                        
                    </ul>
            </div>
        </div>

    <?php }?>
    </div>
</div>
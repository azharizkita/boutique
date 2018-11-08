<div class="container">
    <div class="row">
    <?php 
    if ($this->db->get('bahan')->num_rows() == 0) {
        ?>
        <p class="text-center display-4">Saat ini belum ada entry bahan :(</p>
        <?php
    }
    foreach ($this->db->get('bahan')->result() as $post) {
        foreach ($this->db->get_where('user', array('id' => $post->supplier_id))->result() as $parseUser) {
            $namaSupplier = $parseUser->nama;
        }

    ?>
        <div class="col" style="padding-top: 25px">
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
                        <?php echo form_open_multipart('supplier/addKuantitas'); ?>
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

<button type="button" class="btn btn-primary" style="position: fixed; right: 15px; bottom: 15px; z-index: 5" data-toggle="modal" data-target="#exampleModalCenter">
  Tambah Bahan Baru
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Bahan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('supplier/createBahan'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="cNama">Nama Bahan</label>
                    <input type="text" class="form-control" required id="cNama" name="cNama">
                </div>
                <div class="form-group">
                    <label for="cSpesifikasi">Spesifikasi</label>
                    <input type="textarea" class="form-control" required id="cSpesifikasi" name="cSpesifikasi">
                </div>
                <div class="form-group">
                    <label for="cHarga">Harga</label>
                    <input type="number" class="form-control" required id="cHarga" name="cHarga">
                </div>
                <div class="form-group">
                    <label for="cKuantitas">Kuantitas</label>
                    <input type="number" class="form-control" required id="cKuantitas" name="cKuantitas">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
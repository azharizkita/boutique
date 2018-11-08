<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boutique</title>
</head>
<body>
<div class="container">
<div class="row">
<?php 
    if ($pakaian == NULL) {
        ?>
        <p class="text-center display-4">Saat ini Boutique belum menyediakan pakaian :(</p>
        <?php
    }
    foreach ($pakaian as $dataPakaian) {
        ?>
        <div class="col">
        <div class="card" style="width: 18rem; padding-top: 15px">
            <img class="card-img-top" src="<?php echo base_url('assets/images/uploads/pakaian/')?><?php echo $dataPakaian->gambar?>" alt="Card image cap">
            <div class="card-header">
                <h5 class="card-title"><?php echo $dataPakaian->nama?></h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Made by: </strong><?php echo $dataPakaian->author_id?></li>
                    <li class="list-group-item"><strong>Tipe:  </strong><?php echo $dataPakaian->tipe?></li>
                    <li class="list-group-item"><strong>Bahan: </strong><?php echo $dataPakaian->bahan?></li>
                    <li class="list-group-item"><strong>Spesifikasi: </strong><?php echo $dataPakaian->spesifikasi?></li>
                    <li class="list-group-item"><strong>Ukuran: </strong><?php echo $dataPakaian->ukuran?></li>
                    <li class="list-group-item"><strong>IDR<?php echo $dataPakaian->harga?></strong></li>
                    <li class="list-group-item">
                        <?php echo form_open_multipart('boutique/beli'); ?>
                        <input type="text" value="<?php echo $dataPakaian->id?>" name="id" hidden>
                        <input type="text" value="<?php echo $dataPakaian->harga?>" name="harga" hidden>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" min="1" value="1" name="jumlah">
                        </form>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Pesan</button>
                        </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        </div>
        <?php
    }
?>
</div>
</div>
</body>
</html>
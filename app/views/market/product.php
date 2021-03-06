<div class="container-fluid">
    <div class="row">
        <div class="col" style="max-width: 984px; margin-right: 30px; margin-bottom: 20px;">
            <img src="<?= base_img . $data['product']["images"][0] ?>" alt="..." style="object-fit: fill; width:984px; height: 630px; border-radius:5%;">
        </div>
        <div class="col" style="padding-right: 20px;">
        <?php
        unset($data['product']['images'][0]);
        foreach ($data['product']['images'] as $image) {
        ?>
            <div class="row" style="margin-bottom:20px; margin-left: 30px;">
                <img src="<?= base_img . $image?>" alt="..." style="height: 134px; width: 252px;object-fit:fill; border-radius:10%;">
            </div>
            <?php
        }
        ?>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h4><?= $data['product']['name'] ?></h4>    
            <a href="<?= base_url . 'profile/' . $data['product']['supplier_id'] ?>" style="text-decoration:none;">
                <div style="padding-top: 3rem; display:flex">
                    <img src="<?= base_img ?>/2.png" alt="..." style="border-radius: 50%; width: 71px; height:71px; object-fit:scale-down">
                    <h4 style="margin-top: auto; margin-bottom:auto; margin-left:1rem"><?= $data['product']['supplier'] ?></h4>
                </div>
            </a>
        </div>
        <div class="col-2 ms-auto">
            <h4 style="text-align: end;">Rp <?= $data['product']['price']?></h2>
            <h5 style="text-align: end;">Stock: <?= $data['product']['stock'] . ' ' . $data['product']['unit'] ?></h5>
            <h6 style="text-align: end;"><?= $data['product']['stock_terjual'] . ' ' . $data['product']['unit'] ?> Terjual</h6>
        </div>
        <div class="col-2 ms-auto" style="padding-right: 1rem;">
            <a href="<?= base_url . "dashboard/buyproduct/". $data['product']['id'] ?>">
                <button class="my-button" style="width: 171px; height: 71px;">Buy Product</button>
            </a>
        </div>
    </div>

    <div class="row" style="margin-top: 1rem;">
        <div class="col-8" style="display: block;">
            <p style="text-align:justify"><?= $data['product']['description']  ?></p>
            <h5 style="margin-top: 2rem; color:green;"><?php 
                if (isset($data['product']['certificate']) && isset($data['product']['location'])) {
                    echo "Verified";
                } else echo "Not Verified";
            ?></h5>
            <p style="margin:0px">Location   : <?= $data['product']['location'] ?></p>
            <p>Kemurniaan : <?= $data['product']['purity'] ?></p>
        </div>

        <div class="col-3 ms-auto" style="display: block;">
            <h5 style="text-align: center;">Sertifikat Barang Pertambangan</h4>
            <img src="<?= base_img . $data['product']['certificate'] ?>" alt="Belum ada sertifikat" style="margin-left:4rem; width: 171px; height:235px; object-fit:scale-down">
        </div>
    </div>

    <div class="row" style="margin-top: 2rem;">
        <h5 style="text-align:center;">Review dari Customer</h5>
    </div>

    <?php
    if ($data['product']['review'] == null) 
    {
        echo '<h3 style="text-align:center; margin-top:3rem; color:grey;">Belum Terdapat Review</h3>';
    } else {
    foreach ($data['product']['review'] as $review)
    {?>
    <div class="row" style="margin-top: 2rem;">
        <div class="col" style="display: flex;">
            <img src="<?= base_img ?>no.webp" alt="" style="border-radius: 50%; width: 55px; height:55px; object-fit:scale-down;">
            <div style="display: block; margin-left: 1rem;">
                <h5><?= $review['name'] ?></h5>
                <p style="text-align: justify;"><?= $review['comment'] ?></p>
            </div>
        </div>
        <div class="col">
            <h2 style="text-align: center;"><?= $review['rating'] ?>/5</h2>
        </div>
    </div>
    <?php }}
    ?>
</div>
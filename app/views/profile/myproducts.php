<div class="container-fluid">
<div class="row">
    <div class="col-2" style="background-color: #FEFEFE;">
        <div class="row">
            <a href="<?= base_url ?>" style="margin-inline: 2rem; margin-top:2rem;">
                <img src="<?= base_img ?>E01176BD-7ED1-4E0E-9BD8-8F664AEC27D2.jpg" alt="INDONESEA" style="width:157px; height:157px; object-fit:contain">
            </a>
        </div>
        <div class="row"><a href="<?= base_url . 'profile/' . $data['user']['id'] ?>" class="my-sidebar-option" aria-current="page">Overview</a></div>
        <div class="row"><a href="<?= base_url . 'profile/transaction/' . $data['user']['id'] ?>" class="my-sidebar-option">Transactions</a></div>
        <div class="row"><a href="<?= base_url . 'profile/products/' . $data['user']['id']  ?>" class="my-sidebar-option">Products</a></div>
        <div class="row"><a href="<?= base_url . 'profile/details/' . $data['user']['id'] ?>" class="my-sidebar-option">Account Details</a></div>
        <div class="row"><a href="<?= base_url ?>market/" class="my-sidebar-option">Back to Market</a></div>
        <div class="row" style="margin-top: 12rem; margin-bottom: 4rem"><p> </p></div>
    </div>
    <div class="col" style="background-color: #F5F5FB;">
        <div class="row" style="margin-top: 3rem; margin-left: 1rem;">
            <div class="col">
                <h4 style="margin-block: 1rem;"><?= $data['title'] ?></h3>
            </div>
            <div class="col ms-auto" style="display: flex;  padding-left:15rem;">
                <img src="<?= base_img . $data['user']['profile_picture'] ?>" alt="Profile Picture" style="width: 71px; height:71px; border-radius: 50%; object-fit:fill; margin-right:1rem; margin-left: 2rem;">
                <p style="margin-block: auto; text-align:right; font-size:20pxx;"><?= $data['user']['name'] ?></p>
            </div>
        </div>
        <div class="row" style="margin-bottom: 1rem;margin-left: 1rem;">
            <p style="color:#9191A9; font: size 19px;">Manage it well and get money</p>
        </div>
        <div class="row">
       <?php 
        $counter = 0;
        foreach ($data['products'] as $product) 
        {?>
        <div class="col">
            <a href="<?= base_url . 'market/productdetails/'.$product['id']?>" style="text-decoration: none; color:black">
                <div class="card" style="margin: 10px;">
                    <img src="<?=base_img . $product['images'][0] ?>" class="card-img-top my-img-preview" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text" style="color: #999999; font-size:18">$ <?= $product['price'] ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php
    $counter++;
    if ($counter > 3) 
    {?>
    </div>
    <div class="row">
    <?php }
    }?>
    </div>
</div>
</div>
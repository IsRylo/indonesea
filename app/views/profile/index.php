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
            <p style="color:#9191A9; font: size 19px;">Look what you have made this month</p>
        </div>
        <div class="row" style="margin-left: 1rem;">
            <div class="col">
                <div class="card" style="height: 173px; width: 319px;">
                    <div class="card-body">
                        <p class="card-text" style="color: #999999; font-size:18; margin-top: 1rem; margin-left: 1rem;">Customers</p>
                        <h2 style="margin-left:1rem;"> <?= $data['user']['customers'] ?> </h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="height: 173px; width: 319px;">
                    <div class="card-body">
                        <p class="card-text" style="color: #999999; font-size:18; margin-top: 1rem; margin-left: 1rem;">Revenue</p>
                        <h2 style="margin-left:1rem;"> <?= $data['user']['revenue'] ?> </h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="height: 173px; width: 319px;">
                    <div class="card-body">
                        <p class="card-text" style="color: #999999; font-size:18; margin-top: 1rem; margin-left: 1rem;">Transactions</p>
                        <h2 style="margin-left:1rem;"> <?= $data['user']['transactions'] ?> </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:2rem; margin-left:1rem">
            <h4>Recent Transaction</h4>
            <?php
            for ($i=0; $i < count($data['transactions']); $i++) { 
            ?>
            <a href="<?= base_url . 'profile/transactiondetails/' . $data['user']['id'] . '/' . $data['transactions'][$i]['trans_id'] ?>" style="text-decoration: none; margin-top:1rem;">
                <div class="card" style="height: 90px; width: 91.5%; margin-left: 1rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="<?= base_img. $data['products'][$i]['images'][0] ?>" alt="..." style="max-width: 100px; max-height:65px; border-radius:10%;">
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: #999999; font-size:18; margin-block: 1rem; margin-left: 1rem;"><?= $data['products'][$i]['name'] ?></p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: #999999; font-size:18; margin-block: 1rem; margin-left: 1rem;"><?= $data['products'][$i]['supplier'] ?></p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: #999999; font-size:18; margin-block: 1rem; margin-left: 1rem;"><?= $data['transactions'][$i]['date'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</div>
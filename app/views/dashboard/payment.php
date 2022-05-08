<div class="container-fluid">
    <div class="row">
        <div class="col-2" style="background-color: #FEFEFE;">
            <div class="row">
                <a href="<?= base_url ?>" style="margin-inline: 2rem; margin-top:2rem;">
                    <img src="<?= base_img ?>E01176BD-7ED1-4E0E-9BD8-8F664AEC27D2.jpg" alt="INDONESEA" style="width:157px; height:157px; object-fit:contain">
                </a>
            </div>
            <div class="row"><a href="<?= base_url ?>dashboard/" class="my-sidebar-option" aria-current="page">Dasboard</a></div>
            <div class="row"><a href="<?= base_url ?>dashboard/transaction" class="my-sidebar-option">Transaction</a></div>
            <div class="row"><a href="<?= base_url ?>dashboard/myproducts" class="my-sidebar-option">My Products</a></div>
            <div class="row"><a href="<?= base_url ?>dashboard/myaccount" class="my-sidebar-option">My Account</a></div>
            <div class="row"><a href="<?= base_url ?>dashboard/payment" class="my-sidebar-option">Payment</a></div>
            <div class="row"><a href="<?= base_url ?>market/index" class="my-sidebar-option">Back to Market</a></div>
        <div class="row" style="margin-top: 10rem; margin-bottom: 4rem"><a href="<?= base_url ?>dashboard/signout" class="my-sidebar-option">Sign Out</a></div>
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
                <p style="color:#9191A9; font: size 19px;">Deposit or add your bank account.</p>
            </div>
            <div class="container-fluid" style="background-color:white; max-width:1225px; padding-inline:3rem;padding-block:1rem; height:70%">
                <div class="shadow bg-white rounded" style="margin-top: 2rem;">
                    <div class="card" style="margin-left: 1rem;">
                        <div class="card-body">
                            <p class="card-text" style="color: #999999; font-size:18; margin-block: 1rem; margin-left: 1rem;">Add Card</p>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white rounded" style="margin-top: 2rem;">
                    <div class="card" style="margin-left: 1rem;">
                        <div class="card-body">
                            <p class="card-text" style="color: #999999; font-size:18; margin-block: 1rem; margin-left: 1rem;">Deposit</p>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white rounded" style="margin-top: 2rem;">
                    <div class="card" style="margin-left: 1rem;">
                        <div class="card-body">
                            <p class="card-text" style="color: #999999; font-size:18; margin-block: 1rem; margin-left: 1rem;">Bank</p>
                        </div>
                    </div>
                </div>
                <div class="ms-auto" style="display:flex; float:right; margin-top:4rem;">
                    <form action="<?= base_url ?>dashboard/pay" method="post">
                        <div style="margin: 1rem; padding:1rem;background-color:#C4C4C4; border-radius:10%">
                            <input type="text" name="deposit" id="" class="my-input" style="border: hidden; border-radius: 10%;">
                            <input type="hidden" name="trans_id" value="<?= $data['trans_id'] ?>">
                            <label for="payment">Jumlah deposit dalam RP</label>
                        </div>
                        <button class="my-button" style="width:150px">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
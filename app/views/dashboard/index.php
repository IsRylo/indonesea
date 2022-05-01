<style>
    .my-sidebar-option {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        margin-left: 4rem;
        margin-top: 1rem;
        padding-block: 1rem;
        font-size: 18px;
        color:#C5C5C5;
        text-decoration: none;
    }
    .my-sidebar-option:hover {
        color: black;
        background: linear-gradient(270deg, rgba(69, 241, 8, 0.32) 2%, rgba(255, 255, 255, 0) 100%);
    }   
</style>

<div class="row">
    <div class="col-3">
        <div class="row">
            <img src="<?= base_img ?>E01176BD-7ED1-4E0E-9BD8-8F664AEC27D2.jpg" alt="INDONESEA" style="margin-inline: auto; margin-top:2rem;width:157px; height:157px; object-fit:contain">
        </div>
        <div class="row"><a href="<?= base_url ?>dashboard/home" class="my-sidebar-option" aria-current="page">Dasboard</a></div>
        <div class="row"><a href="<?= base_url ?>dashboard/transaction" class="my-sidebar-option">Transaction</a></div>
        <div class="row"><a href="<?= base_url ?>dashboard/myproducts" class="my-sidebar-option">My Products</a></div>
        <div class="row"><a href="<?= base_url ?>dashboard/myaccount" class="my-sidebar-option">My Account</a></div>
        <div class="row"><a href="<?= base_url ?>dashboard/payment" class="my-sidebar-option">Payment</a></div>
        <div class="row" style="margin-top: 4rem; margin-bottom: 4rem"><a href="<?= base_url ?>market/signout" class="my-sidebar-option">Sign Out</a></div>
    </div>
    <div class="col" style="background-color: #E5E5E5;">
        <div class="" style="margin-left: 2rem;">
            <div class="row" style="margin-top: 3rem;">
                <div class="col">
                    <h3><?= $data['title'] ?></h3>
                </div>
                <div class="col ms-auto" style="display: flex;  padding-left:15rem;">
                    <img src="<?= base_img . $data['image'] ?>" alt="Profile Picture" style="width: 71px; height:71px; border-radius: 50%; object-fit:fill; margin-right:1rem;">
                    <p style="margin-block: auto; text-align:right; font-size:20px;"><?= $data['name'] ?></p>
                </div>
                
            </div>
        </div>
    </div>
</div>
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
        <div class="row" style="margin-top: 10rem; margin-bottom: 4rem"><a href="<?= base_url ?>market/signout" class="my-sidebar-option">Sign Out</a></div>
    </div>
    <div class="col" style="background-color: #F5F5FB;">
        <div class="row" style="margin-top: 3rem; margin-left: 1rem;">
            <div class="col">
                <h4 style="margin-block: 1rem;"><?= $data['title'] ?></h3>
            </div>
            <div class="col ms-auto" style="display: flex;  padding-left:15rem;">
                <img src="<?= base_img . $data['user']['profile_picture'] ?>" alt="<?= $data['user']['profile_picture'] ?>" style="width: 71px; height:71px; border-radius: 50%; object-fit:fill; margin-right:1rem; margin-left: 2rem;">
                <p style="margin-block: auto; text-align:right; font-size:20pxx;"><?= $data['user']['name'] ?></p>
            </div>
        </div>
        <div class="row" style="margin-bottom: 1rem;margin-left: 1rem;">
            <p style="color:#9191A9; font: size 19px; margin-left;">CODE <?= $data['transaction']['trans_id'] ?></p>
        </div>
        <div class="container-fluid" style="background-color:white; max-width:1225px; padding-inline:3rem;padding-block:1rem">
            <form action="<?= base_url ?>dashboard/insertReview" method="POST" enctype="multipart/form-data">
                <div class="container-fluid">
                    <input type="hidden" name="product_id" value="<?= $data['transaction']['product_id'] ?>">
                    <input type="hidden" name="customer_id" value="<?= $data['transaction']['customer_id'] ?>">
                    <input type="hidden" name="name" value="<?= $data['user']['name'] ?>">
                    <input type="hidden" name="profile" value="<?= $data['user']['profile_picture'] ?>">
                    <div>
                        <label for="rating"><h2>Give Us Your Rating: </h2></label><br>
                        <input type="number" class="form-control my-input" id="rating" name="rating" min="1" max="5" placeholder="1 to 5" style="text-align: center;">
                    </div>
                    <div>
                        <label for="rating"><h2>Describe Your Experience</h2></label><br>
                        <textarea class="my-input" name="comment" id="" cols="125%" rows="5" style="display:block;margin-inline: auto;"></textarea>
                    </div>
                    <button class="my-button" style="display: block; margin-inline:auto; margin-block: 4rem; width:15%; height:40px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
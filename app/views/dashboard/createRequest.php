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
        <div class="row"><a href="<?= base_url ?>dashboard/request" class="my-sidebar-option">Request</a></div>
        <div class="row"><a href="<?= base_url ?>market/index" class="my-sidebar-option">Back to Market</a></div>
        <div class="row" style="margin-top: 4rem; margin-bottom: 4rem"><a href="<?= base_url ?>dashboard/signout" class="my-sidebar-option">Sign Out</a></div>
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
            <p style="color:#9191A9; font: size 19px; margin-left:1rem;">Create requests for other people to see</p>
        </div>
        <div class="container-fluid" style="background-color:white; max-width:1225px; padding-inline:3rem;padding-block:1rem">
            <form action="<?= base_url ?>dashboard/addRequest" method="POST" enctype="multipart/form-data">
                <div class="container-fluid">
                    <input type="hidden" name="date" value="<?= date('d M Y') ?>">
                    <input type="hidden" name="requester_id" value="<?= $data['user']['id'] ?>">
                    <label for="exampleInputEmail1" class="form-label">Request Title</label>
                    <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex. Mencari Perak Putih Banjarmasin" name="title">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Price Range (Rp)</label>
                            <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex. 20.000.000 - 30.000.000" name="price">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Category</label>
                            <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex. Logam Mulia" name="category">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Location</label>
                            <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex. Banjarmasin" name="location">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Purity</label>
                            <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex. 90%" name="purity">
                        </div>
                    </div>
                    <div>
                        <label for="description" class="form-label">Product Description:</label>
                        <textarea class="my-input" name="description" id="description" cols="125%" rows="5" style="display:block;margin-inline: auto;"></textarea>
                    </div>
                    <button class="my-button" style="display: block; margin-inline:auto; margin-block: 4rem; width:15%; height:40px;" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
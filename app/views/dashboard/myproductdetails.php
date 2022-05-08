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
                <img src="<?= base_img . $data['user']['profile_picture'] ?>" alt="<?= $data['user']['profile_picture'] ?>" style="width: 71px; height:71px; border-radius: 50%; object-fit:fill; margin-right:1rem; margin-left: 2rem;">
                <p style="margin-block: auto; text-align:right; font-size:20pxx;"><?= $data['user']['name'] ?></p>
            </div>
        </div>
        <div class="row" style="margin-bottom: 1rem;margin-left: 1rem;">
            <p style="color:#9191A9; font: size 19px;">Manage it well and get money</p>
        </div>
        <div class="container-fluid" style="background-color:white; max-width:1225px; padding-inline:3rem;padding-block:1rem">
            <form action="<?= base_url ?>dashboard/" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col mb-3" style="margin-top: 1rem;">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?= $data['product']['name'] ?>">
                    </div>
                    <div class="col mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" value="<?= $data['product']['price'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3" style="margin-top: 1rem;">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="category" value="<?= $data['product']['category'] ?>">
                    </div>
                    <div class="col-6 mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">Quantity</label>
                        <input type="number" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="stock" value="<?= $data['product']['stock'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <textarea class="form-control my-input" id="exampleInputPassword1" name="description"><?= $data['product']['description'] ?></textarea>
                </div>
                <?php
                $counter = 1;
                foreach ($data['product']['images'] as $image) {
                ?>
                <div class="mb-3">
                    <img src="<?= base_img . $image ?>" alt="" style="margin-inline:auto; max-height:200px; max-width:200px; object-fit:scale-down">
                    <label for="exampleInputPassword1" class="form-label">Product Picture <?= $counter ?> </label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="image<?= $counter++ ?>">
                </div>
                <?php  
                }
                ?>
                <div class="mb-3">
                    <video width="320" height="240" controls>
                        <source src="<?= base_img . $data['product']['video'] ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <label for="exampleInputPassword1" class="form-label">Product Video</label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="video" value="<?= $data['product']['video'] ?>">
                </div>
                <div class="mb-3">
                    <img src="<?= base_img . $data['product']['certificate'] ?>" alt="" style="margin-inline:auto; max-height:200px; max-width:200px; object-fit:scale-down">
                    <label for="exampleInputPassword1" class="form-label">Product Certificate</label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="certificate" value="<?= $data['product']['certificate'] ?>">
                </div>
                <div>
                    <input type="hidden" name="id" value="<?= $data['product']['id'] ?>">
                    <input type="hidden" name="supplier" value="<?= $data['product']['supplier'] ?>">
                </div>
                <div class="mb-5">
                    <button class="my-button" style="float:right; width:300px; height:50px" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
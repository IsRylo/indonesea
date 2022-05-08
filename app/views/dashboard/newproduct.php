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
            <p style="color:#9191A9; font: size 19px;">Manage it well and get money</p>
        </div>
        <div class="container-fluid" style="background-color:white; max-width:1225px; padding-inline:3rem;padding-block:1rem">
            <form action="<?= base_url ?>dashboard/addProduct" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col mb-3" style="margin-top: 1rem;">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="col mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="number" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3" style="margin-top: 1rem;">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="category">
                    </div>
                    <div class="col-6 mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">Quantity</label>
                        <input type="number" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="stock">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <textarea class="form-control my-input" id="exampleInputPassword1" name="description" value=""> </textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Picture 1</label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="image1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Picture 2</label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="image2">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Picture 3</label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="image3">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Picture 4</label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="image4">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Video</label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="video">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Certificate</label>
                    <input type="file" class="form-control my-input" id="exampleInputPassword1" name="certificate" required>
                </div>
                <div>
                    <input type="hidden" name="id" value="<?= $data['product']['id'] ?>">
                    <input type="hidden" name="supplier" value="<?= $data['user']['name'] ?>">
                    <input type="hidden" name="supplier_id" value="<?= $data['user']['id'] ?>">
                </div>
                <div class="mb-5">
                    <button class="my-button" style="float:right; width:300px; height:50px" type="submit" name="submit">Validate</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
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
            <p style="color:#9191A9; font: size 19px;">Update your companny profile to latest information</p>
        </div>
        <div class="container-fluid" style="background-color:white; max-width:1225px; padding-inline:3rem;padding-block:1rem">
            <form action="<?= base_url ?>dashboard/updateAccount" method="POST">
                <div class="row">
                    <div class="col mb-3" style="margin-top: 1rem;">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?= $data['user']['name'] ?>">
                    </div>
                    <div class="col mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= $data['user']['email'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Address</label>
                    <input type="text" class="form-control my-input" id="exampleInputPassword1" name="address" value="<?= $data['user']['address'] ?>">
                </div>
                <div class="row">
                <div class="col mb-3" style="margin-top: 1rem;">
                        <label for="exampleInputEmail1" class="form-label">Province</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" name="province" aria-describedby="emailHelp" value="<?= $data['user']['province'] ?>">
                    </div>
                    <div class="col mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">City</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" name="city" aria-describedby="emailHelp" value="<?= $data['user']['city'] ?>">
                    </div>
                    <div class="col mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">Postal Code</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="postal_code" value="<?= $data['user']['postal_code'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3" style="margin-top: 1rem;">
                        <label for="exampleInputEmail1" class="form-label">Country</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="country" value="<?= $data['user']['country'] ?>">
                    </div>
                    <div class="col-6 mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" value="<?= $data['user']['phone'] ?>">
                    </div>
                </div>
                <div>
                    <input type="hidden" name="id" value="<?= $data['user']['id'] ?>">
                </div>
                <div class="mb-5">
                    <button class="my-button" style="float:right; width:300px; height:50px" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
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
            <form action="<?= base_url ?>dashboard/insertMOU" method="POST" enctype="multipart/form-data">
                <label for="exampleInputEmail1" class="form-label">Your MOU <?php if (isset($data['transaction']['mou'])) echo $data['transaction']['mou']; ?></label>
                <input type="file" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="mou">
                <input type="hidden" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="trans_id" value="<?= $data['transaction']['trans_id'] ?>">
                <input type="hidden" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_id" value="<?= $data['user']['id'] ?>">
                <input type="hidden" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="approval1" value="<?= 1 ?>">
                <input type="hidden" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="approval2" value="<?= 0 ?>">
                <?php
                foreach ($data['mou'] as $mou) {
                    if ($mou['user_id'] == $data['user']['id'] && isset($mou['mou']))
                    {?>
                    <br>
                    <p><?= $mou['mou'] ?></p>
                    <iframe
                    src="<?= base_img . $mou['mou'] ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="70%"
                    width="100%">
                    </iframe>
                    <?php
                    break;
                    }
                }
                ?>
                <button class="my-button" style="margin-block:1rem;" type="submit">Submit</button><br>
                <label for="exampleInputEmail1" class="form-label">Partner MOU <?php if (isset($data['transaction']['mou'])) echo $data['transaction']['mou']; ?></label>
                <input type="file" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                <?php
                foreach ($data['mou'] as $mou) {
                    if ($mou['user_id'] != $data['user']['id'])
                    {?>
                    <br>
                    <p><?= $mou['mou'] ?></p>
                    <iframe
                    src="<?= base_img?>MOU.jfif"
                    frameBorder="0"
                    scrolling="auto"
                    height="70%"
                    width="100%">
                    </iframe>
                    <?php
                    break;
                    }
                }
                ?>
            </form>
            <div class="row" style="margin-top: 2rem;">
                <div class="col">
                </div>
                <div class="col"><h4 style="text-align: center;">My MOU</h4></div>
                <div class="col"><h4 style="text-align: center;">Partner MOU</h4></div>
            </div>
            <div class="row" style="margin-top: 2rem;">
                <div class="col"><h4>You Approved : </h4></div>
                <div class="col">
                <?php
                foreach ($data['mou'] as $mou) {
                    if ($mou['user_id'] == $data['user']['id']) {
                        $my_mou = $mou;
                        break;
                    }
                }

                if (isset($my_mou['mou']) && isset($my_mou['approval1']) && $my_mou['approval1']) {
                ?>
                <a href="<?= base_url . 'dashboard/disapprovemyMOU/' . $data['transaction']['trans_id'] ?>" style="text-decoration: none;>
                    <button class="my-button" style="display: block;">Approved - Click to Disapprove</button>
                </a>
                <?php
                }
                else if (!isset($my_mou['mou'])) echo "<p style='text-align:center'> NO MOU </p>";
                else
                {?>
                <a href="<?= base_url . 'dashboard/approvemyMOU/' . $data['transaction']['trans_id'] ?>" style="text-decoration: none; margin-inline:auto;">
                    <button class="my-button" style="width:auto;height:auto;margin-inline:auto;background-color: grey; color:#F5F5FB">Unapproved - Click to approve</button>
                </a>
                <?php
                }
                ?>
                </div>
                <div class="col">
                <?php
                foreach ($data['mou'] as $mou) {
                    if ($mou['user_id'] != $data['user']['id']) {
                        $partner_mou = $mou;
                        break;
                    }
                }

                if (isset($partner_mou['mou']) && isset($partner_mou['approval2']) && $partner_mou['approval2']) {
                ?>
                <a href="<?= base_url . 'dashboard/disapprovepartnerMOU/' . $data['transaction']['trans_id'] ?>" style="text-decoration: none;>
                    <button class="my-button" style="display: block;">Approved - Click to Disapprove</button>
                </a>
                <?php
                }
                else if (!isset($partner_mou)) echo "<p style='text-align:center'> NO MOU </p>";
                else
                {?>
                <a href="<?= base_url . 'dashboard/approvepartnerMOU/' . $data['transaction']['trans_id'] ?>" style="text-decoration: none; margin-inline:auto;">
                    <button class="my-button" style="width:auto;height:auto;margin-inline:auto;background-color: grey; color:#F5F5FB">Unapproved - Click to approve</button>
                </a>
                <?php
                }
                ?>
                </div>
            </div>
            <div class="row" style="margin-top: 2rem;">
                <div class="col"><h4>Partner Approved : </h4></div>
                <div class="col">
                <?php
                if (isset($my_mou) && isset($my_mou['approval2']) && (bool) $my_mou['approval2']) {
                ?>
                    <?php 
                        if ($my_mou['approval2']) {
                            echo "True";   
                        }
                    ?>
                    <button class="my-button" style="display: block;">Approved - Click to Disapprove</button>
                <?php
                }
                else if (!isset($my_mou)) echo "<p style='text-align:center'> NO MOU </p>";
                else
                {?>
                    <button class="my-button" style="width:auto;height:auto;margin-inline:auto;background-color: grey; color:#F5F5FB">Unapproved - Click to approve</button>
                <?php
                }
                ?>
                </div>
                <div class="col">
                <?php
                if (isset($partner_mou['mou']) && isset($partner_mou['approval1']) && $partner_mou['approval1']) {
                ?>
                <button class="my-button" style="display: block;">Approved - Click to Disapprove</button>
                <?php
                }
                else if (!isset($partner_mou)) echo "<p style='text-align:center'> NO MOU </p>";
                else
                {?>
                <button class="my-button" style="width:auto;height:auto;margin-inline:auto;background-color: grey; color:#F5F5FB">Unapproved - Click to approve</button>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
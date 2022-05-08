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
        <div class="container-fluid" style="background-color:white; max-width:1225px; padding-inline:3rem;padding-block:1rem">
            <form action="<?= base_url ?>dashboard/addTransaction" method="POST" enctype="multipart/form-data" id="transaction">
                <div class="row">
                    <div class="col-3 mb-3" style="margin-top: 1rem;">
                       <img src="<?= base_img . $data['product']['images'][0] ?>" alt="" style=" width: 200px; height:310px; object-fit:contain; margin-inline:auto; display:block">
                    </div>
                    <div class="col mb-3" style="margin-top:1rem; display:block" >
                        <label for="exampleInputEmail1" class="form-label">Customer</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['customer_name'] ?>" readonly >
                        <input type="hidden" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="customer_id" value="<?= $data['customer_id'] ?>">
                        <label for="exampleInputEmail1" class="form-label">Date of Transaction</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="date" value="<?= date("d M Y") ?>" readonly>
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['product']['name'] ?>" readonly>
                        <input type="hidden" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_id" value="<?= $data['product']['id'] ?>" readonly>
                        <label for="exampleInputEmail1" class="form-label">Total Price (Rp)</label>
                        <input type="text" class="form-control my-input" id="totalPrice" aria-describedby="emailHelp" name="total" readonly>
                    </div>
                    <div class="col mb-3" style="margin-top:1rem;" >
                        <label for="exampleInputEmail1" class="form-label">Seller</label>
                        <input type="text" class="form-control my-input" id="" aria-describedby="emailHelp" value="<?= $data['seller_name'] ?>" readonly>
                        <input type="hidden" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="seller_id" value="<?= $data['seller_id'] ?>">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <input type="text" class="form-control my-input" id="" aria-describedby="emailHelp" name="status" value="Pending" readonly>
                        <label for="exampleInputEmail1" class="form-label">Amount (<?= $data['product']['unit'] ?>)</label>
                        <input type="number" class="form-control my-input" id="quantity" aria-describedby="emailHelp" name="amount">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="text" class="form-control my-input" id="price" aria-describedby="emailHelp" value="Rp <?= $data['product']['price'] . '/' . $data['product']['unit'] ?>" readonly>
                    </div>
                </div>
               <h4>Shipping Information</h4>
               <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="ship_name">
                        <label for="exampleInputEmail1" class="form-label">Province</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="province">
                        <label for="exampleInputEmail1" class="form-label">Postal Code</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="postal_code">
                        <div class="col" style="display: flex;">
                        <div style="display: flex; margin-top:6rem;">
                            <label for="exampleInputEmail1" style="margin-block: auto; margin-right:1rem;">Shipping</label>
                            <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="ship_status">
                        </div>
                   </div>
                    </div>
                    <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
                        <label for="exampleInputEmail1" class="form-label">City</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="city">
                        <label for="exampleInputEmail1" class="form-label">Country</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="country">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
                    </div>
                    <div class="col" style="display: block;">
                        <input type="hidden" name="mou" value="<?= null ?>">
                        <input type="hidden" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="deposit" value="<?= 0 ?>">
                    </div>
               </div>
               <div class="row" style="margin-top: 1rem;">
                    <div class="col ms-auto mb-3">
                        <button class="my-button" style="float:right;width:300px; height:50px" type="submit">Complete</button>
                    </div>
               </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
$('input').keyup(function(){ // run anytime the value changes
    var quantity  = Number($('#quantity').val());   // get value of field
    var price = '<?= $data['product']['price'] ?>'; // convert it to a float
    console.log(price);
    document.getElementById('totalPrice').value = quantity*price;
// add them and output it
});
</script>
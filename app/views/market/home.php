<div class="container-fluid">
    <div class="ms-auto mb-3">
            <form action="<?= base_url ?>market/search_product" method="POST" style="display: flex; align-items:flex-end">
                <input type="search" class="ms-auto" placeholder="Search Here" name="search">
                <button type="submit">Search<i class="bi bi-search"></i></button>
            </form>
    </div>
    <div class="myheader">
        Put image here
    </div>
    <h2>Categories</p>
    <div class="row">
       <?php 
        foreach ($data['categories'] as $categories => $value) 
        {?>
        <div class="col" style="margin: 10px;">
            <div class="shadow bg-white rounded">
                <a href="<?= base_url.'market/categories/'.$value['name'] ?>" style="text-decoration: none; color:black">
                    <div class="card" style="width: auto;">
                        <img src="<?=base_img . $value['img'] ?>" class="card-img-top my-img-category" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center;"><?= $value['name'] ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php }
       ?>
    </div>
    <h2>Products</h2>
    <div class="row">
       <?php 
        $counter = 0;
        foreach ($data['products'] as $product) 
        {?>
        <div class="col">
            <div class="shadow bg-white rounded">
                <a href="<?= base_url . 'market/productdetails/'.$product['id']?>" style="text-decoration: none; color:black">
                    <div class="card" style="margin: 10px;">
                        <img src="<?=base_img . $product['images'][0] ?>" class="card-img-top my-img-preview" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text" style="color: #999999; font-size:18">$ <?= $product['price'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php
    $counter++;
    if ($counter > 3) 
    {?>
    </div>
    <div class="row">
    <?php }
    }?>
    </div>
</div>
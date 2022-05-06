<div class="container-fluid">
    <div class="row">
        <div class="col-4" style="background-color: #F9E2E2;">
            <div class="row">
                <h2 style="text-align: center; margin-top:28%">WELCOME TO INDONESEA ACCOUNT</h2>
            </div>
            <div style="background-color: white; border-radius:20%; margin-inline:20%; margin-top:10%; margin-bottom:51%;">
                <img src="<?= base_img ?>logo2.png" alt="" style="display:block; object-fit:contain; height: 200px; width:200px; margin-inline:auto;">
            </div>
        </div>
        <div class="col" style="margin-top:1rem;">
            <div style="display: flex; float:right">
                <h4>Tidak memliki akun?</h4>
                <a href="<?= base_url ?>register/" style="text-decoration:none; margin-left:2rem; margin-right:1rem;"><h4>Register</h4></a>
            </div>
            <div class="row">
                <div class="container-fluid" style="margin-left: 1rem;margin-top: 3%;">
                    <h2 style="text-align:justify;">Masuk dalam akun perusahaan</h2>
                    <form action="<?= base_url ?>register/addUser" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                        <div class="row">
                            <div class="col mb-3" style="margin-top:1rem;" >
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="col mb-3" style="margin-top: 1rem;">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input type="password" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address</label>
                            <input type="text" class="form-control my-input" id="exampleInputPassword1" name="address">
                        </div>
                        <div class="row">
                        <div class="col mb-3" style="margin-top: 1rem;">
                                <label for="exampleInputEmail1" class="form-label">Province</label>
                                <input type="text" class="form-control my-input" id="exampleInputEmail1" name="province" aria-describedby="emailHelp">
                            </div>
                            <div class="col mb-3" style="margin-top:1rem;" >
                                <label for="exampleInputEmail1" class="form-label">City</label>
                                <input type="text" class="form-control my-input" id="exampleInputEmail1" name="city" aria-describedby="emailHelp">
                            </div>
                            <div class="col mb-3" style="margin-top:1rem;" >
                                <label for="exampleInputEmail1" class="form-label">Postal Code</label>
                                <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="postal_code">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3" style="margin-top: 1rem;">
                                <label for="exampleInputEmail1" class="form-label">Country</label>
                                <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="country">
                            </div>
                            <div class="col-6 mb-3" style="margin-top:1rem;" >
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
                            </div>
                        </div>
                        <div style="margin-bottom: 10%;">
                            <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="profile_picture">
                        </div>
                        <div>
                            <input type="hidden" name="id">
                        </div>
                        <div class="mb-5">
                            <button class="my-button" style="float:right; width:300px; height:50px; margin-bottom:3rem;" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
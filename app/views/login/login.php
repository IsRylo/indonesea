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
                <div class="container-fluid" style="margin-left: 1rem;margin-top: 15%;">
                    <h2 style="text-align:justify;">Masuk dalam akun perusahaan</h2>
                    <form action="<?= base_url ?>login/log" method="POST">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" class="form-control my-input" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
                        <button type="submit" class="my-button" style="height: 80px; width:300px; margin-top:4rem;">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="wrap">
    <div class="row">

        <nav class="navbar navbar-expand-lg navbar-light fixed-top ">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <a class="navbar-brand" href="#" style="margin-right: -60px; padding-left:20px;">Edit Profile</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav m-auto" id="link" style="padding-left: -60px;">
                </div>
                <div class="out"><a id="logout" class="nav-link" href="/Awesome/logout"
                        style="padding-left: -70px;">Logout</a></div>

            </div>
        </nav>
    </div>
</div>
<div class="container">
    <form action="/Awesome/update/<?= $account['id'];?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table>
            <tr>
                <td>Fullname</td>
                <td class="titikDua">:</td>
                <td>
                    <div class="mb-3">
                        <input type="text" name="fname" name="fname" class="form-control"
                            value="<?php echo $account['fname'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td class="titikDua">:</td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            value="<?php echo $account['username']?>">

                        <?php if(session()->getFlashdata('eror')) { ?>
                        <p class="warning">
                            <?=  session()->getFlashdata('eror'); ?> *
                        </p>
                        <?php } ?>
                    </div>

                </td>
            </tr>

            <tr>
                <td>E-mail</td>
                <td class="titikDua">:</td>
                <td>
                    <div class=" mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="<?php echo $account['email']?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td class="titikDua">:</td>
                <td>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Create New Password">
                    </div>
                    <div class="mb3">
                        <input type="hidden" value="<?php echo $account['password']?>" name="password1">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td class="titikDua">:</td>
                <td>
                    <div class="mb-3">
                        <input type="date" class="form-control" id="bdate" name="bdate" placeholder="bdate"
                            value="<?php echo $account['bdate']?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td class="titikDua">:</td>
                <td>
                    <div class="mb-3">
                        <div class="row m-auto">
                            <div class="col-md-4">
                                <input type="radio" id="gender" name="gender1" class="form-check-input" value="Male">
                                Male
                            </div>
                            <input type="hidden" value="<?php echo $account['gender'] ?>" name="gender">
                            <div class="col-md-4">
                                <input type="radio" id="gender" name="gender1" class="form-check-input" value="Female">
                                Female
                            </div>
                            <div class="col-md-4">
                                <select name="status" id="status" style="width: 100%;">
                                    <option value="<?php echo $account['status'] ?>">Status</option>
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Bio</td>
                <td class="titikDua">:</td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="bio" id="bio" placeholder="Bio"
                            value="<?php echo $account['bio']?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Photo Profile</td>
                <td class="titikDua">:</td>
                <td>
                    <div class="mb-3">
                        <input type="file" name="gambar" id="gambar">
                        <input type="hidden" name="gambar1" value="<?php echo $account['gambar']; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td><button type="submit" class="btn" id="buttonCreate" name="send">Save</button></td>
                <td><button class="btn">
                        <a href="/Awesome/delete/<?= $account['id']; ?>"
                            onclick="return confirm('Are you sure want to delete this account ?');">Delete
                        </a>
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?= $this->endSection(); ?>
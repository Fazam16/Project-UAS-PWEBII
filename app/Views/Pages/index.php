<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <section>
        <div class="row m-auto">
            <div class="col-md-6">
                <h1>Awesome</h1>
                <p class="keterangan">Awesome membantumu menjalin silaturahmi yang baik dengan orang-orang yang hadir
                    dihidupmu
                </p>
            </div>
            <div class="col-md-6">
                <div class="wrap">
                    <form action="/Awesome/auth" method=" post">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                                autofocus>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>

                        <button type="submit" class="btn" id="buttonLogin" value="login">Login</button> <br>
                        <hr>

                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <a href="#" class="akunBaru">Create New Account</a>
                        </button>
                    </form>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header modal-dialog-scrollable">
                                    <h2 class="modal-title" id="exampleModalLabel">Daftar</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="/Awesome/save" method="POST" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="fname" name="fname"
                                                        placeholder="Fullname" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Username" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Create Password" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="date" class="form-control" id="bdate" name="bdate"
                                                        placeholder="bdate" required>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row m-auto">
                                                        <div class="col-md-4">
                                                            <input type="radio" id="gender" name="gender"
                                                                class="form-check-input" value="Male" required> Male
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" id="gender" name="gender"
                                                                class="form-check-input" value="Female" required> Female
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="status" id="status" style="width: 100%;"
                                                                required>
                                                                <option value="">Status</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Single">Single</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="bio" id="bio"
                                                        placeholder="Bio">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="file" name="gambar" id="gambar" accept="image/*">
                                                </div>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button> <br>
                                                <button type="submit" class="btn" id="buttonCreate"
                                                    style="margin-top: 5px;" name="kirim">Create New Account</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
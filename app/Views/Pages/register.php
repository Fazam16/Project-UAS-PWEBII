<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome to Awesome!</h1> <br>
            <div class="p">
                <p>Awesome membantumu menjalin silaturahmi yang baik dengan orang-orang yang hadir dihidupmu</p>
            </div>
            <a href="/Awesome"><button class="btn" id="buttonLogin" value="login">Login</button></a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
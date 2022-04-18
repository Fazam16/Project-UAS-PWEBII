<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="p">
                    <p>
                        Incorrect username and/or password!
                    </p>
                </div>
                <a href="/Awesome"><button class="btn" id="buttonLogin" value="login">Try Again</button></a>
            </div>
        </div>
    </div>
</div>
</ <?= $this->endSection(); ?>
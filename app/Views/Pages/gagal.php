<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="p">
                <p>
                    WARNING !!!<br> Failed to create your account <br> Username is already use by another user
                </p>
            </div>
            <a href="/Awesome"><button class="btn" id="buttonLogin" value="login">Try Again</button></a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
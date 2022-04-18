<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
                                $bdate = $account['bdate'];
                                function bulan_indo($bulan_angka) {
                                    $bulan = array(1=>'January', 
                                    'February', 
                                    'March', 
                                    'April', 
                                    'May', 
                                    'June', 
                                    'July', 
                                    'August', 
                                    'September', 
                                    'October', 
                                    'November', 
                                    'December'
                                    );
                                                                     
                                    return $bulan[$bulan_angka];
                                }    
                                                                     
                                $tampH="" ;
                                $tampB=0;
                                $tampT=0;
                                 
                                $format_indo = date('d-m-Y', strtotime($bdate));
                                                                       
                                $pecah = explode('-', $format_indo);
                                                                  
                                $hari = date('D', strtotime($format_indo));
                                $tgl = $pecah[0];
                                $bulan = $pecah[1];
                                $tahun = $pecah[2];
                                                                     
                                $tampH=$tgl;
                                $tampB=bulan_indo((int)$bulan);
                                $tampT=$tahun;
                                   
                                $lahir =  $tampH . " " . $tampB . " " . $tampT;

                               
                            ?>

<div class="wrap">
    <div class="row">

        <nav class="navbar navbar-expand-lg navbar-light fixed-top ">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <a class="navbar-brand" href="#" style="margin-right: -60px; padding-left:20px;">Awesome</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav m-auto" id="link" style="padding-left: -60px;">
                    <a class="nav-link" href="#kartu">Profile</a>
                    <a class="nav-link" href="/Awesome/edit/<?= $account['id']; ?>">Edit</a>
                    <a class="nav-link" href="#about">About</a>
                </div>
                <div class="out"><a id="logout" class="nav-link" href="/Awesome/logout"
                        style="padding-left: -70px;">Logout</a></div>

            </div>
        </nav>
    </div>
</div>

<div class="row m-auto mt-5">
    <div class="col-md-3 "><br><br><br></div>
    <div class="col-md-6 " id="kartu">
        <h2><b>.:</b> PROFILE <b>:.</b></h2>
        <hr>
        <div class="row">
            <div class="col-md-5 m-auto" style="text-align: center; ">
                <img class="photo" src="/img/<?=  $account['gambar'];?>" alt="">
                <h4><?= $account['fname']; ?></h4>
            </div>
            <div class="col-md-7 m-auto" style="padding-top : 20px; margin-right : 10px;">
                <table class="table table-striped">
                    <tr class="baris">
                        <td>Username</td>
                        <td>:</td>
                        <td><?= $account['username']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?= $account['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td><?= $account['gender']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?= $account['status']; ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>**********</td>
                    </tr>
                    <tr class="baris1">
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td><?= $lahir; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <div class="row" id="about">
            <div class="col-md-12">
                <h4><b>.:</b> About Me <b>:.</b></h4>
                <p class="aboutme">
                    <?= $account['bio']; ?>
                </p>
            </div>
        </div>
    </div>
</div>


<div class="col-md-3 "></div>
<br><br>
<?= $this->endSection(); ?>
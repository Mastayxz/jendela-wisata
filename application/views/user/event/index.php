<!-- Meta -->
<?php $this->load->view('landing/header') ?>


<link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
<!-- Navbar -->
<?php $this->load->view('landing/navbar') ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user/tempat_wisata'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Event <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Event And Activity</h1>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('landing/bar') ?>



<div class="container">
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <label for="filter">Filter by:</label>
            <select id="filter" class="custom-select">
                <option value="all">All</option>
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <!-- Add more categories as needed -->
            </select>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <?php foreach ($event as $ev) : ?>
            <div class="col-md-4 ftco-animate">

                <div class="project-wrap hotel">
                    <a href="#" class="img">
                        <img src="<?= base_url() . '/upload/event/' . $ev->gambar_event; ?>" class="img">
                        <span class="price">Rp. <?= number_format($ev->biaya_event); ?> </span>
                    </a>
                    <div class="text p-4 mb-2">
                        <h3><a href="#" class="mb-5"><?= $ev->nama_event; ?></a></h3>

                        <div class="location"><span class="fa fa-map-marker"></span> <?= $ev->alamat_event; ?> </div>

                        <ul>
                            <li><span class="flaticon-shower"></span>2</li>
                            <li><span class="flaticon-king-size"></span>3</li>
                            <li><span class="flaticon-sun-umbrella"></span><?= $ev->nama; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<!-- JS -->
<?php $this->load->view('landing/footer') ?>
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
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user/tempat_wisata'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hotel <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Destinastion</h1>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('landing/bar');
?>



<!-- <article class="col-md-12">

    <!-- PRODUCT CARDS -->
<h3>Destinasi Wisata</h3>
<!-- <a href="<?= base_url('user/Home_ak'); ?>" class="btn btn-primary">Akomodasi</a> -->

<!-- <div class="cards-8 section-gray">
        <div class="container">
            <div class="row">
                <?php foreach ($tempat_wisata as $tw) : ?>
                    <div class="col-md-3">
                        <div class="card card-product">
                            <div class="card-image">
                                <a href="#"> <img src="<?= base_url() . '/upload/destinasi/' . $tw->gambar1; ?>" alt=""></a>
                            </div>
                            <div class="table">
                                <h6 class="category text-rose">Destinasi</h6>
                                <h4 class="card-caption">
                                    <a href="<?= base_url('user/tempat_wisata/detail/' . $tw->id_tempat_wisata); ?>"><?= $tw->nama; ?></a>
                                </h4>
                                <div class="card-address"><?= $tw->alamat; ?></div>
                                <div class="card-address"><?= $tw->kategori; ?></div>

                                <div class="ftr">
                                    <div class="price">
                                        <h5 class="mt-3">Rp. <?= number_format($tw->biaya); ?></h5>
                                    </div>
                                    <div class="stats">
                                        <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-simple btn-warning" data-original-title="Saved to Wishlist"> <i class="fa fa-heart"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div> -->
</article>


<div class="container">
    <div class="row mt-5">
        <?php foreach ($tempat_wisata as $tw) : ?>
            <div class="col-md-4 ftco-animate">

                <div class="project-wrap hotel">
                    <a href="#" class="img">
                        <img src="<?= base_url() . '/upload/destinasi/' . $tw->gambar1; ?>" alt="" class="img">
                        <span class="price">Rp. <?= number_format($tw->biaya); ?> </span>
                    </a>
                    <div class="text p-4 mb-2">
                        <h3><a href="<?= base_url('user/tempat_wisata/detail/' . $tw->id_tempat_wisata); ?>"><?= $tw->nama; ?></a></h3>

                        <div class="location"><span class="fa fa-map-marker"></span> <?= $tw->alamat; ?> </div>
                        <div class="location"><span class="fa fa-bars"></span> <?= $tw->kategori; ?> </div>

                        <ul>
                            <li><span class="flaticon-shower"></span>2</li>
                            <li><span class="flaticon-king-size"></span>3</li>
                            <li><span class="flaticon-sun-umbrella"></span><?= $tw->kategori; ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<!-- JS -->
<!-- JS -->
<?php $this->load->view('landing/footer') ?>
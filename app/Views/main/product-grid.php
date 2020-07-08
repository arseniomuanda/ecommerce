<!--= View | Product-Grid -->
<div class="section" id="start">
    <div class="container">
        <h2>
            Products
        </h2>
        <h3>Featured Products</h3>
        <hr>

    </div>
    </div>


    <div class="section" id="overview">
        <div class="container">
            <h2>
                Legumes
            </h2>

            <hr>
            <div class="section-grid">
                <ul class="list-grid">
                    <?php foreach ($legumes as $legume) { ?>
                        <li>
                            <div class="box-grid-i" style="background:linear-gradient(rgba(0, 0, 0, 0.50),rgba(0, 0, 0, 0.10)),url(/assets/images/prods/img-pro-03.jpg);">
                                <div class="box-grid-detals">
                                    <h3><?= $legume['name'] ?></h3>
                                    <div class="detals-price">
                                        <h4><?= number_format($legume['price'], 2, ',', '.') ?></h4>
                                    </div>
                                </div>

                                <div class="disc">
                                    <h4><?= $legume['name'] ?></h4>
                                    <p><?= $legume['desc1'] ?></p>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        <li><a href="/item/single/<?= $legume['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <h2>
                Frutas
            </h2>
            <hr>

            <div class="section-grid">
                <ul class="list-grid">
                    <?php foreach ($frutas as $fruta) { ?>
                        <li>
                            <div class="box-grid-i" style="background:linear-gradient(rgba(0, 0, 0, 0.50),rgba(0, 0, 0, 0.10)),url(/assets/images/prods/img-pro-03.jpg);">
                                <div class="box-grid-detals">
                                    <h3><?= $fruta['name'] ?></h3>
                                    <div class="detals-price">
                                        <h4><?= number_format($fruta['price'], 2, ',', '.') ?></h4>
                                    </div>
                                </div>

                                <div class="disc">
                                    <h4><?= $fruta['name'] ?></h4>
                                    <p><?= $fruta['desc1'] ?></p>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        <li><a href="/item/single/"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <h2>
                Outro Nome
            </h2>

            <hr>
            <div class="section-grid">
                <ul class="list-grid">
                    <?php foreach ($sucos as $suco) { ?>
                        <li>
                            <div class="box-grid-i" style="background:linear-gradient(rgba(0, 0, 0, 0.50),rgba(0, 0, 0, 0.10)),url(/assets/images/prods/img-pro-03.jpg);">
                                <div class="box-grid-detals">
                                    <h3><?= $suco['name'] ?></h3>
                                    <div class="detals-price">
                                        <h4><?= number_format($suco['price'], 2, ',', '.') ?></h4>
                                    </div>
                                </div>

                                <div class="disc">
                                    <h4><?= $suco['name'] ?></h4>
                                    <p><?= $suco['desc1'] ?></p>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        <li><a href="/item/single/<?= $suco['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <a href="/item/pesquisar" class="fields-btn">Search More</a>

        </div>
    </div>
<div class="section" id="overview">
  <div class="container">
    <h2>
      Diversos
    </h2>
    <hr>
    <div class="section-grid">
      <ul class="list-grid">
        <?php foreach ($diversos as $diverso) { ?>
          <li>
            <div class="box-grid-i" style="background:linear-gradient(rgba(0, 0, 0, 0.50),rgba(0, 0, 0, 0.10)),url(<?= base_url('/assets/images/prods/diversos.jpg') ?>);">

              <div class="disc">
                <h4><?= $diverso['name'] ?></h4>
                <p><?= $diverso['desc1'] ?></p>
                <ul>
                  <li><a onclick="add_cart(`<?= $diverso['price'] ?>`,`<?= $diverso['id'] ?>`)" id="add-prod"><i class="fa fa-cart-plus"></i></a></li>
                  <li><a href="/item/single/<?= $diverso['id'] ?>"><i class="fa fa-eye"></i></a></li>
                </ul>
              </div>

            </div>
            <div class="detals-price">
              <h4 id="price-cont">R<?= number_format($diverso['price'], 2, ',', '.') ?></h4>
              <h4 id="name-cont"><?= $diverso['name'] ?>h</h4><br>
              <!--i class="fa fa-star"></i><i class="fa fa-star"></i>
              <i class="fa fa-star"></i><i class="fa fa-star"></i>
              <i class="fa fa-star"></i-->
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
            <div class="box-grid-i" style="background:linear-gradient(rgba(0, 0, 0, 0.50),rgba(0, 0, 0, 0.10)),url(<?= base_url('/assets/images/prods/fruta.jpg') ?>);">

              <div class="disc">
                <h4><?= $fruta['name'] ?></h4>
                <p><?= $fruta['desc1'] ?></p>
                <ul>
                  <li><a href="#"><i onclick="add_cart(`<?= $diverso['price'] ?>`,`<?= $diverso['id'] ?>`)" class="fa fa-cart-plus"></i></a></li>
                  <li><a href="/item/single/<?= $fruta['id'] ?>"><i class="fa fa-eye"></i></a></li>
                </ul>
              </div>

            </div>
            <div class="detals-price">
              <h4 id="price-cont">R<?= number_format($fruta['price'], 2, ',', '.') ?></h4>
              <h4 id="name-cont"><?= $fruta['name'] ?></h4><br>
              <!--i class="fa fa-star"></i><i class="fa fa-star"></i>
              <i class="fa fa-star"></i><i class="fa fa-star"></i>
              <i class="fa fa-star"></i-->
            </div>

          </li>
        <?php } ?>
      </ul>
    </div>

    <a href="<?= base_url('/item/pesquisar') ?>" class="fields-btn">Search More</a>
    <?php if ((session()->get('is_admin')==1)) { #vai ser apenas visto se o user logado for admin do sistema ?>
      <a href="<?= base_url('/item/add') ?>" class="fields-btn">Adicionar Producto</a> <!-- Futuramente pode ser um modal... -->
    <?php } ?>
  </div>
</div>

<script>
  function add_cart(price, item) {
    $.ajax({
      url: '/buyitem/create',
      method: 'POST',
      data: {
        buy_id: 1,
        item_id: item,
        taxa: 0,
        cost: price,
        amount: 1,
      },
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      },
      success: function(data2) {
        location.reload()
      }
    })
  }
</script>
<!-- View | Product-Single -->
<?php foreach ($items as $item) { ?>

  <!-- about -->
  <a name="overview"></a>
  <div class="section" id="overview">
    <div class="container">
      <div class="overview-content">

        <div>
          <img src="<?= base_url('/assets/images/blog-img-02.jpg') ?>" alt="">
        </div>

        <div>
          <h2><strong><?= $item['name'] ?></strong></h2>
          <h3><strong><?= number_format($item['price'], 2, ',', '.') ?></strong></h3>
          <p>Category: <strong><?= $item['category'] ?></strong></p>
          <p>Tags: <strong><?= $item['category'] ?>, <?= $item['name'] ?></strong></p>
          <p><?= $item['desc1'] ?></p>
          <button onclick="add_cart(`<?= $item['price'] ?>`,`<?= $item['id'] ?>`)" type="button"><i class="fa fa-cart-plus"></i>Add To Cart</button>
          <?php if ((session()->get('is_admin') == 1)) { #vai ser apenas visto se o user logado for admin do sistema 
          ?>
            <button href="item/add/<?= $item['id'] ?>" type="button"><i class="fa fa-edit"></i>Editar Producto<//button> <?php } ?> </div> </div> <div>
              <h2><strong>Description</strong></h2>
              <p><?= $item['desc1'] ?></p>

        </div>
      </div>

    </div>
  </div>
<?php } ?>

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
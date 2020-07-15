<?php
$db = \Config\Database::connect();
$id = session()->get('buy_id');

$items = $db->query("SELECT buy_item.*, item.name as name, item.price as price  FROM `buy_item` INNER JOIN item ON buy_item.item_id=item.id WHERE `buy_id` = $id")->getResultArray();
?>
<div class="cart-content">
  <div>
    <div class="table-main table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Images</th>
            <td></td>
            <th>Product Name</th>
            <td></td>
            <th>Price</th>
            <td></td>
            <th>Quantity</th>
            <td></td>
            <th>Total</th>
            <td></td>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $stotal = $total = $discount = $taxe = 0;
          ?>
          <?php foreach ($items as $item) { ?>
            <tr>
              <td class="thumbnail-img">
                <a href="#">
                  <img class="img-fluid" src="<?= base_url('/assets/images/prods/img-pro-01.jpg') ?>" alt="" />
                </a>
              </td>
              <td></td>
              <td class="name-pr">
                <a href="#">
                  <?= $item['name'] ?>
                </a>
              </td>
              <td></td>
              <td class="price-pr">
                <p>R <?= number_format($item['price'], 2, ',', '.') ?></p>
              </td>
              <td></td>
              <td class="quantity-box">
                <input type="number" size="4" onfocusout="update(<?= $item['id'] ?>,<?= $item['amount']?>, <?= $item['price']?>)" value="<?= $item['amount'] ?>" min="0" step="1" class="c-input-text qty text">
              </td>
              <td></td>
              <td class="total-pr">
                <?php
                $stotal += $item['price'];
                $total += $item['cost'];
                ?>
                <p>R <?= number_format($item['cost'], 2, ',', '.') ?></p>
              </td>
              <td></td>
              <td class="remove-pr">
                <a href="#">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <input type="submit" value="UPDATE CART" id="btn-coupon">
  </div>

  <div>
    <h3><strong>Order Summary</strong></h3>
    <p>Sub Total: <strong>R <?= number_format($stotal, 2, ',', '.') ?></strong></p>
    <hr class="line-simple">

    <p><strong>Grand Total R <?= number_format($total, 2, ',', '.') ?></strong> </p>
    <hr class="line-simple">
    <label for=""><strong>Deliver</strong></label>
    <input type="radio" name="drive" id="drive"><label for="">Yes</label>
    <input type="radio" name="drive" id="drive"><label for="">Not</label>
    <a href="#popup"><button>Finalizar</button></a>



  </div>
</div>

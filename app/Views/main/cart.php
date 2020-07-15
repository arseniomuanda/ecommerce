<div class="section" id="cart-section">
  <div class="container">

    <div id="showCart">

    </div>

    <a name="popup"></a>
    <div class="popup" id="popup">
      <div class="popup-inner">
        <div class="popup-text">
          <h1>Checkout</h1>

          <div class="popup-form">
            <form action="">
              <input type="radio" name="card-fields" id="card-fields1">
              <label for="">Master Card</label>

              <br>

              <input type="radio" name="card-fields" id="card-fields2">
              <label for="">Paypal Card</label><br>

              <input type="radio" name="card-fields" id="card-fields3">
              <label for="">Visa Card</label><br>



              <button>Submit</button>

            </form>

            <div class="payment-icon">
              <ul>
                <li><img class="img-fluid" src="<?= base_url('/assets/images/payment-icon/1.jpg') ?>" alt=""></li>
                <li><img class="img-fluid" src="<?= base_url('/assets/images/payment-icon/1.jpg') ?>" alt=""></li>
                <li><img class="img-fluid" src="<?= base_url('/assets/images/payment-icon/1.jpg') ?>" alt=""></li>
              </ul>
            </div>
          </div>

          <div class="popup-close">
            <i id="popup-btnClose" class="fa fa-times"></i>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $('document').ready(function() {
      $.ajax({
        url: '/item/cart',
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        },
        success: function(cart) {
          $('#showCart').html(cart)
        }
      })
      // $('#showCart').html("Olas")
    })

    function update(id, amount, price) {
      $.ajax({
        url: '/item/updateCart',
        headers: {
          'X-Required-With': 'XMLHttpRequest'
        },
        data: {
          amount: amount,
          price: price,
          id: id
        },
        success: function(resul) {
          // $('#showCart').html(resul)
          // location.reload()
        }
      })
    }
</script>
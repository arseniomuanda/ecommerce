<!-- View | Product Search -->
<div class="section" id="contact-form">
    <div class="container">

        <div class="search-content">

            <div id="produtos">



            </div>

            <div>
                <h2>Search Any Product</h2>
                <hr>

                <form method="POST">
                    <input type="text" class="fields" id="name" name="name" placeholder="Name">
                    <select name="categories" class="fields" id="category" name="category">
                        <option value="fruta">Fruta</option>
                        <option value="suco">Suco</option>
                        <option value="legume">Legume</option>
                    </select><br>
                    <input type="number" class="fields" name="price" id="price" placeholder="Price"><br>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $('document').ready(function() {
        $('#name').keyup(function() {
            var name = $('#name').val()
            var category = $('#category').val()
            var price = $('#price').val()
            console.log(name)
            $.ajax({
                url: '/item/search',
                method: 'POST',
                data: {
                    name: name,
                    category: category,
                    price: price,
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(data1) {
                    $('#produtos').html(data1)
                }
            })

        })
    })
</script>
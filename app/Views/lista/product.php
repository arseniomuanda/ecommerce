<div class="table-main table-responsive">
    <table class="table">
        <thead>
            <?php if(count($items)>0){?>
            <tr>
                
                <th>Images</th>
                <td style="width: 10%;"></td>
                <th>Product Name</th>
                <td style="width: 10%;"></td>
                <th>Price</th>
            </tr>
            <?php }?>
        </thead>
        <tbody>
            <?php foreach ($items as $item) { ?>
                <tr>
                    <td class="thumbnail-img">
                        <a href="/item/single/<?= $item['id']?>">
                            <img class="img-fluid" src="<?= base_url('/assets/images/prods/img-pro-01.jpg') ?>" alt="" />
                        </a>
                    </td>
                    <td style="width: 10%;"></td>
                    <td class="name-pr">
                        <a href="/item/single/<?= $item['id']?>">
                            <?= $item['name'] ?>
                        </a>
                    </td>
                    <td style="width: 10%;"></td>
                    <td class="price-pr">
                        <p><?=number_format($item['price'], 2, ',', '.')  ?></p>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once 'header.php'; ?>

<head>
    <title>Alışveriş Sepetim | BTMarket</title>
</head>
<?php if ($total_count == 0) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Uyarı!</strong> <br />
        Sepetinizde henüz ürün bulunmamaktadır. <br />
        Lütfen bu <a href="index">link</a>'e tıklayarak ürünler sayfasına gidiniz...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php else : ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong class="bt-text">Bilgi!</strong> <br />
        Sepetinizde <strong class="bt-text"><?= $total_count; ?> adet</strong> ürün bulunmaktadır.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col"><i class="fa bt-text fa-barcode"></i> #</th>
                <th scope="col"><i class="fa bt-text fa-images"></i> Ürün Resmi</th>
                <th scope="col"><i class="fa bt-text fa-text-width"></i> Ürün Adı</th>
                <th scope="col"><i class="fa bt-text fa-lira-sign"></i> Fiyatı</th>
                <th scope="col"><i class="fa bt-text fa-sort-numeric-down"></i> Adeti</th>
                <th scope="col"><i class="fa bt-text fa-lira-sign"></i> Toplam</th>
                <th scope="col"><i class="fa bt-text fa-tasks"></i> İşlem</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($shop_products as $product) : $i++; ?>
                <tr>
                    <th scope="row"><?= $i < 10 ? '0' . $i : $i; ?></th>
                    <td>
                        <img class="item-img" src="assets/img/products/<?= $product->p_imgurl; ?>" alt="<?= $product->p_name; ?>">
                    </td>
                    <td><?= $product->p_name; ?></td>
                    <td><?= $product->p_price; ?></td>
                    <td>
                        <a href="assets/lib/query-cart?p=incCount&product_id=<?= $product->p_id; ?>" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                        <input type="text" class="item-count-input" value="<?= $product->count; ?>">
                        <a href="assets/lib/query-cart?p=decCount&product_id=<?= $product->p_id; ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-minus"></i>
                        </a>
                    </td>
                    <td><strong><?= $product->total_price; ?> ₺</strong></td>
                    <td>
                        <button product-id="<?= $product->p_id; ?>" class="btn bt-warning btn-sm btnRemoveFromCart" type="button">
                            <i class="fa fa-trash"></i> Sil
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-right">
                    Toplam Ürün: <span class="bt-text"> <?= $total_count; ?> adet</span>
                </th>
                <th colspan="3" class="text-right">
                    Toplam Tutar: <span class="bt-text"><?= $total_price; ?> ₺</span>
                </th>
                <th colspan="1" class="text-right">
                    <button product-id="<?= $product->p_id; ?>" class="btn bt-warning btnRemoveAllCart">
                        <i class="fa fa-trash-alt"></i> Sepeti Komple Temizle
                    </button>
                </th>
            </tr>
        </tfoot>
    </table>
<?php endif ?>
<?php require_once 'footer.php'; ?>
<div class="items_list">
    <?php for ($i = 0; $i < sizeof($items); $i++) : ?>
        <div class="item">
            <div class="image">
                <img src="<?php echo $items[$i]['img'] ?>" alt="knife image" class="item_img">
            </div>
            <div class="item_info">
                <div class="item_name">
                    <?php echo $items[$i]['name'] ?>
                </div>
                <div class="item_default_price">
                    Default price: <?php echo $items[$i]['default_price'] ?>$
                </div>
                <div class="item_discount">Discount:
                    <span class="item_discount_number">
                    <?php echo $items[$i]['discount'] ?> %
                </span>
                </div>
                <div class="item_price_usd">Price:
                    <span class="item_price_usd_number">
                    <?php echo $items[$i]['total_price_usd'] ?> $
                </span>
                </div>
                <div class="item_price_rub">
                    Price:
                    <span class="item_price_rub_number">
                    <?php echo $items[$i]['total_price_rub'] ?> ₽
                </span></div>
            </div>
        </div>
    <?php endfor; ?>
</div>
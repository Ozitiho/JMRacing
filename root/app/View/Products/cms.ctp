<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Products</h1>
    </legend>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Discount price</th>
            <th>Description</th>
            <th>Size</th>
        </tr>

        <?php foreach ($products as $product): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($product['Product']['Name'], array('controller' => 'products', 'action' => 'view', $product['Product']['id']));
                    ?>
                </td>
                <td><?php echo $product['Product']['Price']; ?></td>
                <td><?php echo $product['Product']['DiscountPrice']; ?></td>
                <td><?php echo $product['Product']['description']; ?></td>
                <td><?php echo $product['Product']['Size']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                            'Edit', array('action' => 'edit', $product['Product']['id'])
                    );
                    ?>
                    |
                    <?php
                    echo $this->Form->postLink(
                            'Delete', array('action' => 'delete', $product['Product']['id']), 
                            array('confirm' => 'Are you sure?')
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($product); ?>
    </table>
    <a href="/products/add" class="buttonLink">Add Product</a>
</div>
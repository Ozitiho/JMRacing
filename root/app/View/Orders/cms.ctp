<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>

<div class="box orders form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Orders</h1>
    </legend>
    <table>
        <tr>
            <th>Name</th>
            <th>First Name</th>
            <th>Company</th>
            <th>Country</th>
            <th>City</th>
            <th>Street</th>
            <th>House number</th>
        </tr>

        <?php foreach ($orders as $order): ?>
            <tr>
                <td>
                    <?php echo $order['Order']['name'];?>
                </td>
                <td><?php echo $order['Order']['first_name']; ?></td>
                <td><?php echo $order['Order']['company']; ?></td>
                <td><?php echo $order['Order']['country']; ?></td>
                <td><?php echo $order['Order']['city']; ?></td>
                <td><?php echo $order['Order']['street']; ?></td>
                <td><?php echo $order['Order']['house_number']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                            'Edit', array('action' => 'edit', $order['Order']['id'])
                    );
                    echo " | ";
                    echo $this->Form->postLink(
                            'Delete', array('action' => 'delete', $order['Order']['id']), array('confirm' => 'Are you sure?')
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($order); ?>
    </table>
    <a href="/orders/checkout" class="buttonLink">Add Order</a>
</div>
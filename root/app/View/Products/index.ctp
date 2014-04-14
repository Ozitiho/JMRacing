<h1>Product</h1>

<?php echo $this->Html->link(
    'Add Product',
    array('controller' => 'products', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>ID</th>
		<th>Name</th>
        <th>Price</th>
        <th>Size</th>
		<th>Photo</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $product['Product']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($product['Product']['Name'],
				array('controller' => 'products', 'action' => 'view', $product['Product']['id'])); ?>
        </td>
		<td><?php echo $product['Product']['Price']; ?></td>
        <td><?php echo $product['Product']['Size']; ?></td>
		<td><?php echo $product['Product']['Photo']; ?></td>
		<td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $product['Product']['id']),
                    array('confirm' => 'Are you sure?')
                );
				echo "|";
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $product['Product']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
<h1>Sponsor</h1>

<?php
echo $this->Html->link(
        'Add Sponsor', array('controller' => 'sponsors', 'action' => 'add')
);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>URL</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

<?php foreach ($sponsors as $sponsor): ?>
        <tr>
            <td><?php echo $sponsor['Sponsor']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($sponsor['Sponsor']['Name'], array('controller' => 'sponsors', 'action' => 'view', $sponsor['Sponsor']['id']));
                ?>
            </td>
            <td><?php echo $sponsor['Sponsor']['Image']; ?></td>
            <td><?php echo $sponsor['Sponsor']['URL']; ?></td>
            <td>
                <?php
                echo $this->Form->postLink(
                        'Delete', array('action' => 'delete', $sponsor['Sponsor']['id']), array('confirm' => 'Are you sure?')
                );
                echo "|";
                echo $this->Html->link(
                        'Edit', array('action' => 'edit', $sponsor['Sponsor']['id'])
                );
                ?>
            </td>
        </tr>
<?php endforeach; ?>
    <?php unset($sponsor); ?>
</table>
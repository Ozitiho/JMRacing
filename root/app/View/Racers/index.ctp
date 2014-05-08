<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>
<h1>Racers</h1>

<?php echo $this->Html->link(
    'Add Racer',
    array('controller' => 'racers', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>RacerID</th>
        <th>Name</th>
        <th>Racer Number</th>
        <th>Delete/Edit</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($racers as $racer): ?>
    <tr>
        <td><?php echo $racer['Racer']['id']; ?></td>
        <td><?php echo $racer['Racer']['Name']; ?></td>
        <td><?php echo $racer['Racer']['RacerNumber']; ?></td>
        <td>            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $racer['Racer']['id']),
                    array('confirm' => 'Are you sure?')
                );
				echo "|";
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $racer['Racer']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
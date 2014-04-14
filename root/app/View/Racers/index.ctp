<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>

<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'racers', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($racers as $racer): ?>
    <tr>
        <td><?php echo $racer['Racer']['RacerID']; ?></td>
        <td>
            <?php echo $this->Html->link($racer['Racer']['Name'],
				array('controller' => 'racers', 'action' => 'view', $racer['Racer']['RacerID'])); ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $racer['Racer']['RacerID']),
                    array('confirm' => 'Are you sure?')
                );
				echo "|";
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $racer['Racer']['RacerID'])
                );
            ?>
        </td>
        <td><?php echo $racer['Racer']['DateOfBirth']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
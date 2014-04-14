<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>

<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'events', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Country</th>
        <th>City</th>
        <th>Photo</th>
        <th>Date</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['Event']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($event['Event']['Country'],
				array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?>
        </td>
        <td><?php echo $event['Event']['City']; ?></td>
        <td><?php echo $event['Event']['Photo']; ?></td>
        <td><?php echo $event['Event']['Date']; ?></td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $event['Event']['id']),
                    array('confirm' => 'Are you sure?')
                );
				echo "|";
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $event['Event']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
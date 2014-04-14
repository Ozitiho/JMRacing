<!-- File: /app/View/Posts/index.ctp -->

<h1>Event Results</h1>

<?php echo $this->Html->link(
    'Add Result',
    array('controller' => 'results', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>EventID</th>
        <th>RacerID</th>
        <th>R1</th>
        <th>R2</th>
        <th>GP</th>
        <th>Date</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($results as $result): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($result['Result']['id'],
				array('controller' => 'results', 'action' => 'view', $result['Result']['id'])); ?>
		</td>
        <td><?php echo $result['Result']['EventID']; ?></td>
        <td><?php echo $result['Result']['RacerID']; ?></td>
        <td><?php echo $result['Result']['R1']; ?></td>
        <td><?php echo $result['Result']['R2']; ?></td>
        <td><?php echo $result['Result']['GP']; ?></td>
        <td><?php echo $result['Result']['Date']; ?></td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $result['Result']['id']),
                    array('confirm' => 'Are you sure?')
                );
				echo "|";
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $result['Result']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
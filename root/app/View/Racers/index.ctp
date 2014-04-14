<!-- File: /app/View/Posts/index.ctp -->

<h1>Racers</h1>

<?php echo $this->Html->link(
    'Add Racer',
    array('controller' => 'racers', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>RacerID</th>
        <th>Name</th>
        <th>Biography</th>
        <th>Date Of Birth</th>
        <th>Place Of Birth</th>
        <th>Nationality</th>
        <th>Residence</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Hardware</th>
        <th>Racer Number</th>
        <th>Photo</th>
        <th>Tickets Link</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($racers as $racer): ?>
    <tr>
        <td><?php echo $racer['Racer']['id']; ?></td>
        <td><?php echo $racer['Racer']['Name']; ?></td>
        <td><?php echo $racer['Racer']['Biography']; ?></td>
        <td><?php echo $racer['Racer']['DateOfBirth']; ?></td>
        <td><?php echo $racer['Racer']['PlaceOfBirth']; ?></td>
        <td><?php echo $racer['Racer']['Nationality']; ?></td>
        <td><?php echo $racer['Racer']['Residence']; ?></td>
        <td><?php echo $racer['Racer']['Height'] / 100; ?>m</td>
        <td><?php echo $racer['Racer']['Weight']; ?>kg</td>
        <td><?php echo $racer['Racer']['Hardware']; ?></td>
        <td><?php echo $racer['Racer']['RacerNumber']; ?></td>
        <td><?php echo $racer['Racer']['Photo']; ?></td>
        <td><?php echo $racer['Racer']['TicketsLink']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
            <?php
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
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Events</h1>
    </legend>
    <table>
        <tr>
            <th>Id</th>
            <th>Country</th>
            <th>City</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th colspan="2">Date</th>
        </tr>

        <!-- Here is where we loop through our $posts array, printing out post info -->

        <?php foreach ($events as $event): ?>
            <tr>
                <td><?php echo $event['Event']['id']; ?></td>
                <td>
                    <?php echo $this->Html->link($event['Event']['Country'], array('controller' => 'events', 'action' => 'view', $event['Event']['id']));
                    ?>
                </td>
                <td><?php echo $event['Event']['City']; ?></td>
                <td><?php echo $event['Event']['Latitude']; ?></td>
                <td><?php echo $event['Event']['Longitude']; ?></td>
                <td><?php echo $event['Event']['Date']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                            'Edit', array('action' => 'edit', $event['Event']['id'])
                    );
                    ?>
                    |
                    <?php
                    echo $this->Form->postLink(
                            'Delete', array('action' => 'delete', $event['Event']['id']), 
                            array('confirm' => 'Are you sure?')
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($event); ?>
    </table>
    <a href="/events/add" class="buttonLink">Add Event</a>
</div>
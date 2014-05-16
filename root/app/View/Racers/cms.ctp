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
        <h1>Racers</h1>
    </legend>
    <table>
        <tr>
            <th>Name</th>
            <th>Racer Number</th>
        </tr>

        <?php foreach ($racers as $racer): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($racer['Racer']['Name'], array('controller' => 'racers', 'action' => 'view', $racer['Racer']['id']));
                    ?>
                </td>
                <td><?php echo $racer['Racer']['RacerNumber']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                            'Edit', array('action' => 'edit', $racer['Racer']['id'])
                    );
                    ?>
                    |
                    <?php
                    echo $this->Form->postLink(
                            'Delete', array('action' => 'delete', $racer['Racer']['id']), 
                            array('confirm' => 'Are you sure?')
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($racer); ?>
    </table>
    <a href="/racers/add" class="buttonLink">Add Racer</a>
</div>
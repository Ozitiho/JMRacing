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
        <h1>Sponsors</h1>
    </legend>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th colspan="2">URL</th>
        </tr>

        <?php foreach ($sponsors as $sponsor): ?>
            <tr>
                <td><?php echo $sponsor['Sponsor']['id']; ?></td>
                <td>
                    <?php echo $sponsor['Sponsor']['Name'];?>
                </td>
                <td><?php echo $sponsor['Sponsor']['URL']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                            'Edit', array('action' => 'edit', $sponsor['Sponsor']['id'])
                    );
                    echo " | ";
                    echo $this->Form->postLink(
                            'Delete', array('action' => 'delete', $sponsor['Sponsor']['id']), array('confirm' => 'Are you sure?')
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($post); ?>
    </table>
    <a href="/sponsors/add" class="buttonLink">Add Sponsor</a>
</div>
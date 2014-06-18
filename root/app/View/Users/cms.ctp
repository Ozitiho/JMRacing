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
        <h1>Users</h1>
    </legend>
    <table>
        <tr>
            <th>Username</th>
            <th>Role</th>
            <th>Created</th>
            <th>Modified</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php echo $user['User']['username'];?>
                </td>
                <td><?php echo $user['User']['role']; ?></td>
                <td><?php echo $user['User']['created']; ?></td>
                <td><?php echo $user['User']['modified']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                            'Edit', array('action' => 'edit', $user['User']['id'])
                    );
                    echo " | ";
                    echo $this->Form->postLink(
                            'Delete', array('action' => 'delete', $user['User']['id']), array('confirm' => 'Are you sure?')
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($user); ?>
    </table>
    <a href="/users/add" class="buttonLink">Add User</a>
</div>
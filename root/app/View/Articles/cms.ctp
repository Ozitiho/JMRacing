<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>

<?php
// Set a custom title
$this->start('title');
print("Articles CMS");
$this->end();
?>

<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Articles</h1>
    </legend>
    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>CreateDate</th>
            <th colspan="2">LastUpdatedDate</th>
        </tr>

        <!-- Here is where we loop through our $posts array, printing out post info -->

        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?php echo $article['Article']['id']; ?></td>
                <td>
                    <?php echo $this->Html->link($article['Article']['Title'], array('controller' => 'articles', 'action' => 'view', $article['Article']['id']));
                    ?>
                </td>
                <td><?php echo $article['Article']['CreateDate']; ?></td>
                <td><?php echo $article['Article']['LastUpdatedDate']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                            'Edit', array('action' => 'edit', $article['Article']['id'])
                    );
                    echo " | ";
                    echo $this->Form->postLink(
                            'Delete', array('action' => 'delete', $article['Article']['id']), array('confirm' => 'Are you sure?')
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($post); ?>
    </table>
    <a href="/articles/add" class="buttonLink">Add Article</a>
</div>
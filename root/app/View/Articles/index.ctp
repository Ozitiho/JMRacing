<!-- File: /app/View/Posts/index.ctp -->

<h1>Articles</h1>

<?php echo $this->Html->link(
    'Add Article',
    array('controller' => 'articles', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>ArticleID</th>
		<th>EditorID</th>
        <th>Title</th>
        <th>Message</th>
		<th>CreateDate</th>
		<th>LastUpdatedDate</th>
		<th>Photo</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?php echo $article['Article']['id']; ?></td>
		<td><?php echo $article['Article']['EditorID']; ?></td>
        <td>
            <?php echo $this->Html->link($article['Article']['Title'],
				array('controller' => 'articles', 'action' => 'view', $article['Article']['id'])); ?>
        </td>
		<td><?php echo $article['Article']['Message']; ?></td>
        <td><?php echo $article['Article']['CreateDate']; ?></td>
		<td><?php echo $article['Article']['LastUpdatedDate']; ?></td>
		<td><?php echo $article['Article']['Photo']; ?></td>
		<td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $article['Article']['id']),
                    array('confirm' => 'Are you sure?')
                );
				echo "|";
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $article['Article']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
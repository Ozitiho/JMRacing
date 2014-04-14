<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($article['Article']['Title']); ?></h1>

<p><small>Created: <?php echo $article['Article']['CreateDate']; ?></small></p>
<p><small>Created: <?php echo $article['Article']['LastUpdatedDate']; ?></small></p>

<p><?php echo h($article['Article']['Message']); ?></p>
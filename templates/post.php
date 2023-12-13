<h3><?= $post->getTitle() ?></h3>
<ul>
    <li>Post ID: <?= $post->getId() ?></li>
    <li>Content: <?= $post->getContent() ?></li>
    <li>Author: <?= $post->getAuthor() ?></li>
    <li>Date: <?= $post->getDate()->format('d M Y - H:i:s') ?></li>
</ul>

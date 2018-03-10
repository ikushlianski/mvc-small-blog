<p>This is main page from views/main/index.php file</p>
<p>Here is the list of all news:</p>
<?php foreach ($news as $piece) : ?>
    <h3><?php echo $piece['title']?></h3>
    <p><?php echo $piece['text']?></p>
    <hr>
<?php endforeach; ?>




<h1>Jobster</h1>
<h2><?php echo $heading; ?></h2>
<?php 
    foreach($listings as $listing) {
        echo "<h3>" . $listing['title'] . "</h3>";
        echo "<p>" . $listing['description'] . "</p>";
    }
?>
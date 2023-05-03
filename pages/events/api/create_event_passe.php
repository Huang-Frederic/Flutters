<?php

include($_SERVER['DOCUMENT_ROOT']."/pages/connect_db.php");

if(isset($_GET['search']) && $_GET['search']!=""){
    $q = 'SELECT * FROM EVENT WHERE name LIKE ? AND date_event <= ?  ORDER BY date_event DESC;';

    $req = $bdd->prepare($q);
    $reponse = $req->execute([
        '%' . $_GET['search'] . '%',
        date('Y-m-d')
    ]);
    $result = $req -> fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $event) { 
        echo '<a class="event_a" href="event_page.php?id=' . $event['id_event'] . '">'
    ?>
            <?php 
                echo '<img style="filter:grayscale(90%);" id="event_img" src="../dashboard/events/' . $event['image'] . '">
                <p class="titles"> ' . $event['name'] . '</p> 
            ';?>
        </a>
    <?php 
    }
} else {
    $q = 'SELECT * FROM EVENT WHERE date_event <= ?  ORDER BY date_event DESC;';

    $req = $bdd->prepare($q);
    $reponse = $req->execute([
        date('Y-m-d')
    ]);
    $result = $req -> fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $event) { 
        echo '<a class="event_a" href="event_page.php?id=' . $event['id_event'] . '">'
    ?>
            <?php 
                echo '<img style="filter:grayscale(90%);" id="event_img" src="../dashboard/events/events-img/' . $event['image'] . '">
                <p class="titles"> ' . $event['name'] . '</p> 
            ';?>
        </a>
<?php 
}
}
?>
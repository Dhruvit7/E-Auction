<?php

include_once 'dbConnection.php';

if (isset($_POST['submit'])) {
    $startPrice = $_POST['start-price'];
    $reservePrice = $_POST['reserve-price'];
    $name = $_POST['item-name'];
    if ($reservePrice > $startPrice) {
        $sql = 'UPDATE auction set start_price=:startPrice,reserve_price=:reservePrice WHERE auction_id =' .$_GET["auct"];
        $itemSTMT = $db->prepare($sql);
        $itemSTMT->bindParam(':startPrice', $startPrice);
        $itemSTMT->bindParam(':reservePrice',$reservePrice);
        $itemSTMT->execute();
        $sql1 = 'UPDATE item set label=:label WHERE item_id =' .$_GET["auct"];
        $itemSTMT1 = $db->prepare($sql1);
        $itemSTMT1->bindParam(':label', $name);
        $itemSTMT1->execute();
        header('Location: listings.php');
    }
    else {
        $errPrice = "Please ensure that reserve price is bigger than start price";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/productpage.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!--    Clock code-->
    <script src="clockCode/countdown.js"></script>
</head>
<body>
<?php
    include('nav.php');
    $resp = $db->prepare('SELECT * FROM Auction WHERE auction_id = :auction_id');
    $resp->bindParam(':auction_id', $_GET["auct"]);
    $resp->execute();
    $data = $resp->fetch();
    $resp->closeCursor();

    $item = $db->prepare('SELECT * FROM Item WHERE item_id = :item_id');
    $item->bindParam(':item_id', $data["item_id"]);
    $item->execute();

    $item_data = $item->fetch();
    $item->closeCursor();
    ?>

<form class="form-horizontal" style="padding-top:50px" role="form" method="post" action="#" enctype="multipart/form-data">
        <fieldset style="padding-top:50px">
            <!-- Item Name -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="item-name">Product Name</label>
                <div class="col-md-4">
                    <input id="item-name" name="item-name"  class="form-control" value="<?php echo htmlspecialchars($item_data['label']) ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="start-price">Start Price</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="number" id="start-price" name="start-price" placeholder="Start Price" class="form-control" value="<?php echo htmlspecialchars($data['start_price']) ?>"/>
                    </div>
                </div>
            </div>
            <!-- Reserve Price -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="reserve-price">Reserve Price</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="number" id="reserve-price" name="reserve-price" placeholder="Reserve Price" class="form-control" value="<?php echo htmlspecialchars($data['reserve_price']) ?>"/>
                    </div>
                    <?php if (!empty($errPrice)) {
                        echo $errPrice;
                    } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit">Ready to Update?</label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-primary" required>Update Auction</button>
                </div>
            </div>
        </fieldset>
    </form>

</body>
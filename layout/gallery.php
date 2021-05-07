    <?php
    $title = "گالری";
    $header = "گالری";

    include_once ("../main/header.php");





//    */////////////////////////////////////////////////////////////*/

    include_once ("../database/db.php");

    $statment = $pdo->prepare("SELECT image FROM gallery");
    if($statment->execute()){
        if($statment->rowCount() >= 1){
            $gallery = $statment->fetchAll(PDO::FETCH_OBJ);
        }
    }










    ?>
        <div class="gallery">
            <div class="contain">
                <div class="pictures-gallery">
                    <?php if($statment->rowCount() < 1){ ?>
                        <h4>عکسی یافت نشد.</h4>
                        <?php }else{ ?>
                    <?php foreach ($gallery as $item): ?>
                    <div class="pic">
                        <img src="../pictures/gallery/<?= $item->image ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                    <?php } ?>
                </div>
            </div>
    </div>
    <?php
    include_once ("../main/foter.php");
    ?>
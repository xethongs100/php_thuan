<?php
    echo
    '<div class="col-md-4">
    <form action="./controller.php" method="post">
        <div class="panel panel-info">
            <div class="panel-heading">'.$product[$i]->title.'</div>
            <div class="panel-body"><img src="assets/prod_images/'.$product[$i]->image.'" style="width:200px; height:180px;"></div>
            <div class="panel-heading">$'.$product[$i]->price.'
            <button class="btn btn-danger btn-xs" name="add_product" style="float:right;" value="'.$product[$i]->id.'">Add to Cart</button>
            </div>
        </div>
        </form>
    </div>';
?>
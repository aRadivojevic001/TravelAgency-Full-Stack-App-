<?php
/**@var $params ListCountryModel
 */

use app\models\ListCountryModel;

?>
<!--<div class="row g-4 p-3 mt-5">-->

<!--    --><?php
if($params !== NULL && $params->country !== null) {
    foreach ($params->country as $items) {

        echo "<div class='card mb-2 mt-2 ml-5' style='min-width: 250px'>";
        echo "<img style='height: 150px;' src='$items->country_image' class='card-img-top border-0'>";
        echo "<div class='card-body'>";
        echo "<p>$items->country_description</p>";
        echo "</div>";
        echo "<div class='card-footer'>";
        echo "<a href='/api/city?id=$items->id' class='btn btn-info'>$items->country_name</a>";
        echo "</div>";
        echo "</div>";
    }
}
?>

<!--</div>-->

<!--<div class='card' style='width: 18rem;'>-->
<!--    <img class='card-img-top' src='...' alt='Card image cap'>-->
<!--    <div class='card-body'>-->
<!--        <h5 class='card-title'>Card title</h5>-->
<!--        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--        <a href='#' class='btn btn-primary'>Go somewhere</a>-->
<!--    </div>-->
<!--</div>-->



<!--echo "<div class='box'>";-->
<!--    echo "<div class='detail-box'>";-->
<!--        echo "<img src='$items->country_image'  alt='...'>";-->
<!--        echo "<a href='#'>";-->
<!--            echo $items->country_name;-->
<!--            echo "</a>";-->
<!--        echo "</div>";-->
<!--    echo "</div>";-->
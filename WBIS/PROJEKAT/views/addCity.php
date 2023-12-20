<?php
/**@var $params CityModel
 */

use app\models\CityModel;

?>
<link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="display-4 text-secondary text-center mt-5 mb-5">New City</h2>
            <form action="/addcityProcess" method="post">
                <input type="text" name="city_name" placeholder="city name" style="text-indent:10px;" class="form-control border border-secondary"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'city_name') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }

                        }
                    }
                }
                ?>
                <input type="text" name="city_image" placeholder="city image" style="text-indent:10px;" class="form-control border border-secondary"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'city_image') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }
                        }
                    }
                }
                ?>
                <input type="number" name="country_id" placeholder="country id" style="text-indent:10px;" class="form-control border border-secondary"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'country_id') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }
                        }
                    }
                }
                ?>
                <button type="submit" class="btn btn-info form-control">Add</button>
                <a href="/administration" class="btn form-control btn-info">BACK</a>
            </form>
        </div>
    </div>
</div>
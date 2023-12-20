<?php
/**@var $params \app\models\LoginModel
 */

?>
<link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="display-4 text-light text-center mt-5 mb-5">Login</h2><br>
            <form action="/loginProcess" method="post">
                <input type="email" name="email" placeholder="email" class="form-control"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'email') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }

                        }
                    }
                }
                ?>
                <input type="password" name="password" placeholder="password" class="form-control"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'password') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }
                        }
                    }
                }
                ?>
                <button type="submit" class="btn btn-info form-control">Login</button>
            </form>
        </div>
    </div>
</div>
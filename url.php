<?php
if (is_array($_FILES) && count($_FILES) > 0) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "polizas/".$_FILES['file']['name'])) {
            //more code here...
            echo "polizas/".$_FILES['file']['name'];
        } else {
            echo 0;
        }
} else {
    echo 0;
}
?>
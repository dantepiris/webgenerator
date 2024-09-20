<?php

function getConection($query) {
        $conecion = mysqli_connect("localhost", "adm_webgenerator", "webgenerator2024", "webgenerator");
        $sql = $query;
        return(mysqli_query($conecion,$sql));
    }
 ?>
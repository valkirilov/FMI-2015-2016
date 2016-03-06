<?php

/*
 * Complete the function below.
 */

function show_nav($data, $pageId) {
    $result = '<nav>';
    foreach($data as $key => $value) {
       if ($key == $pageId)  {
           $result .= '<a href="?page=' . $key . '" class="selected">' . $value['title'] . '</a>';
       }
       else {
           $result .= '<a href="?page=' . $key . '">' . $value['title'] . '</a>';
       }
    }
    $result .= '</nav>';
    return $result;
}

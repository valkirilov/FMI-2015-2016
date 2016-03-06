</php

/*
 * Complete the function below.
 */

function show_page( $pageId,  $data) {
    $result = '';
    if (array_key_exists($pageId, $data)) {
        $result .= '<h1>' . $data[$pageId]['title'] . '</h1>';
        $result .= '<h2>' . $data[$pageId]['lecturer'] . '</h2>';
        $result .= '<p>' . $data[$pageId]['description'] . '</p>';
    }
    else {
        $result .= '<p>Моля изберете курс</p>';
    }
    $result . '<br>';
    return $result;
}

<?php

require_once('config.php');

$action = optional_param('action');
switch ($action) {
    case 'search':
        $text = clean_param(optional_param('q'), PARAM_NOTAGS);

        $result = array();
        if ($text <> '') {
            $data = null;
            $url = "https://www.googleapis.com/customsearch/v1?key={$CONFIG->searchkey}&cx={$CONFIG->searchcx}&q="
                .urlencode($text);
            if ($curl = curl_init($url)) {
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $searchresults = curl_exec($curl);
                $data = json_decode($searchresults);
                curl_close($curl);
            }

            if (isset($data->searchInformation->totalResults)) { // noerror
                if ($data->searchInformation->totalResults > 0) {
                    $key = 0;
                    foreach ($data->items as $item) {
                        $result[$key] = new stdClass();
                        $result[$key]->title   = $item->title;
                        $result[$key]->link    = $item->link;
                        $result[$key]->snippet = $item->snippet;
                        $key++;
                    }
                }
            } else {
                $result['error'] = true;
            }
        }
        echo json_encode($result);
        break;

    // other actions...
}

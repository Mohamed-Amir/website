<?php
/**
 * @param $title
 * @return string
 */
function gePageSection($title){
    return '<div class="page-title-section">
        <div class="page-title-wrap">
            <div class="page-title-overlay"></div>
            <div class="page-title-info">
                <ol class="breadcrumb">
                    <li><a href="/">الرئيسية</a></li>
                    <li class="active">'.$title.'</li>
                </ol>
                <h1 class="page-title">'.$title.'</h1>
            </div>
        </div>
    </div>';
}

/**
 * @return mixed
 */
function about(){
    return \App\Models\About::first();
}

/**
 * @return mixed
 */
function contact_us(){
    return \App\Models\Contact_us::first();
}

/**
 * @param $limit
 * @return mixed
 */
function getClients($limit){
    $clients=\App\Models\Client::orderBy('id','desc');
    if($limit != 0)
        $clients=$clients->take($limit);
    return $clients->get();
}
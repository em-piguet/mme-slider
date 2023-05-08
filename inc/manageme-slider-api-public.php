<?php

function display_slider($atts)
{

    $options = get_option('manageme_options');

    $mmpro_base_url =  'https://www.manage-me.pro';
    $mysocietyID = $atts['societyid'];

    // if empty add default
    if(! $mysocietyID) {
        $mysocietyID = 'id1';
    }
    //
    if($mysocietyID === 'id1') {
        $mysocietyAccess = $options['manageme_field_account'];
    }
    if($mysocietyID === 'id2') {
        $mysocietyAccess = $options['manageme_field_account2'];
    }
    // si y a un des deux qui a une valeur
    if($mysocietyAccess) {

        $api_prestation_url = $mmpro_base_url . '/api/society/'.$mysocietyAccess.'/service/'.$atts['serviceid'].'/lesson' ;

        $api_lesson_url = $mmpro_base_url . '/api/society/'.$mysocietyAccess.'/lesson/' ;
        $api_cart_url = $mmpro_base_url . '/Registration/Open?soc='.$mysocietyAccess.'&lsn=';

        $slider = "<div class='ManageMeSlider'>";
        $slider .= "<div class='ManageMe-loading sp sp-circle' style='display: block;'></div>";
        $slider .= "<script>";
        $slider .= " var prestation_url = '$api_prestation_url';";
        $slider .= " var lesson_url = '$api_lesson_url';";
        // $slider .= " var cart_url = '$api_cart_url';";
        $slider .= "</script>";
        $slider .= "<div class='ManageMeSliderContent owl-carousel owl-theme'></div></div>";

        return $slider;

    } else {

        return '';

    }


}

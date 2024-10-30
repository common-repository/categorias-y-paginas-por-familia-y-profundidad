<?php

function fwp_compare_by_name($a, $b) {

  return strcmp($a->name, $b->name);
}

function fwp_compare_by_post_title($a, $b) {

  return strcmp($a->post_title, $b->post_title);
}

function fwp_barajar_con_semilla( $array, $semilla) {
    
    $barajado = array();
    $semilla = ($semilla == 0) ? 1 : $semilla;

    for ($rest = $contador = count($array);$contador>0;$contador--) {
        $semilla %= $contador;
        $temporal = array_splice($array,$semilla,1);
        $barajado[] = $temporal[0];
        $semilla = $semilla*$semilla + $rest;
    }

    return $barajado;
}


function fwd_excluir_paginas($array_pages, $excluir_array){
    foreach ($array_pages as $key => $value) {
      if( in_array($value->ID, $excluir_array) ){                            
        unset($array_pages[$key]);
      }
    }
    return $array_pages;
}

function fwd_excluir_categorias($array_cats, $excluir_array){                    
    foreach ($array_cats as $key => $value) {
      if( in_array($value->term_id, $excluir_array) ){                            
        unset($array_cats[$key]);
      }
    }
    return $array_cats;
}


function fwp_loop_hermanas($cat_recorrer,$limite,$esta_cat,$excluir_cats = "",$estilado = ""){

    global $wpdb;

    if( $estilado){ $texto = '<ul class="fwd-ul">'; }else{ $texto = '<ul>'; }

    //excluyo cats no deseadas                      
    $cat_recorrer = fwd_excluir_categorias($cat_recorrer,$excluir_cats);

    //barajo, recorto y ordeno
    $cat_recorrer = fwp_barajar_con_semilla($cat_recorrer,$esta_cat->term_id);
    $cat_recorrer = array_slice($cat_recorrer,0,$limite);
    usort($cat_recorrer, 'fwp_compare_by_name');

    foreach ($cat_recorrer as $key => $value) { 

        //excluyo cat actual
        if( $value->term_id  !== $esta_cat->term_id){

            $texto .= '<li><a href="' . get_category_link( get_category($value->term_id ))  . '">';

            if($estilado){

                $custom_res = $wpdb->get_results("select meta_value
                FROM {$wpdb->termmeta}
                WHERE meta_key = 'imagen_destacada'
                AND term_id = '$value->term_id'
                LIMIT 1;"
                );

                if($custom_res[0]->meta_value !== NULL){
                  $esta_imagen_src = wp_get_attachment_image_src($custom_res[0]->meta_value, 'thumbnail');
                  $texto .= '<img src="'. $esta_imagen_src[0] . '"/>';
                }

            }

            $texto .= "<span>" . $value->name . "</span></a></li>";

        }else{
          $limite++;
        }


        if($key >= $limite ){break;}

    }

    $texto .= '</ul>';

    return $texto;

}

function fwp_loop_pages($pages_array,$texto,$limite,$estilado = ""){

    if( $estilado){ $texto = '<ul class="fwd-ul">'; }else{ $texto = '<ul>'; }

    foreach ($pages_array as $key => $value) { 

        $texto .= '<li><a href="' . get_permalink($value->ID) . '">';

        if( $estilado && has_post_thumbnail($value->ID) && get_post_type($value->ID) == "page"){
            $texto .= '<img src="'. get_the_post_thumbnail_url($value->ID) . '"/>';
        }

        $texto .= "<span>" . $value->post_title . "</span></a></li>";

        if($key >= $limite){break;}
    }

    $texto .= '</ul>';

    return $texto;
}


?>
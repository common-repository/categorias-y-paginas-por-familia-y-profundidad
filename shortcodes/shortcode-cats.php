<?php

// hacer que funcionen los shortcodes en las descripciones de categorías
add_filter( 'term_description', 'shortcode_unautop' );
add_filter( 'term_description', 'do_shortcode' );
remove_filter( 'pre_term_description', 'wp_filter_kses' );


// Add Shortcode
function fwp_related_categories( $atts, $cat_hermanas ) {

global $wpdb;

// Attributes
 extract(shortcode_atts(array(
        'tipo' => 'hermanas',
        'limite' => 5,
        'cat' => 'cat',
        'excluir' => "",
        'estilado' => ""
    ), $atts));
    
  $texto = '';

  //coger la categoría por argumento o identificarla
  if($cat !== 'cat'){  $esta_cat = get_category( (int)$cat );  }
  else{  $esta_cat = get_category(get_query_var('cat'));  }
    
    // manejar error si se llama fuera de una categoría
    if( !is_wp_error( $esta_cat ) ) {

            $limite = ($limite > 0) ? (int)$limite : 1;
            $cat_id = $esta_cat->term_id;

            if( !is_array($excluir) ){
              $excluir = explode(",", $excluir);
            }


            // sacar la familia
            $cat_padre = !empty($esta_cat->parent) ?  get_category( $esta_cat->parent  ) : '';
            $cat_hijas = get_terms(array('taxonomy' => 'category', 'parent' => $cat_id,'hide_empty' => false) );
            $cat_hermanas = get_terms(array('taxonomy' => 'category', 'parent' => $esta_cat->parent,'hide_empty' => false) );


            // chequear contenido de los atributos
            switch ($tipo) {
                case "hijas":

                    if(!empty($cat_hijas)){
                
                        //excluyo cats no deseadas  
                        if($excluir !== ""){
                          $cat_hijas = fwd_excluir_categorias($cat_hijas,$excluir);                       
                        }

                        //barajo, recorto y ordeno
                        $cat_hijas = fwp_barajar_con_semilla($cat_hijas,$cat_id);
                        $cat_hijas = array_slice($cat_hijas,0,$limite);
                        usort($cat_hijas, 'fwp_compare_by_name');

                        $texto = '<ul class="fwd-ul">';

                        foreach ($cat_hijas as $key => $value) {
                 
                          $texto .= '<li> <a href="' .  get_category_link( get_category( $value->term_id ) )  . '">';

                          if($estilado){

                            $custom_res = $wpdb->get_results("select meta_value
                            FROM {$wpdb->termmeta}
                            WHERE meta_key = 'imagen_destacada'
                            AND term_id = '$value->term_id'
                            LIMIT 1;"
                            );

                            if($custom_res[0]->meta_value !== ""){
                              $esta_imagen_src = wp_get_attachment_image_src($custom_res[0]->meta_value, 'thumbnail');
                              $texto .= '<img src="'. $esta_imagen_src[0] . '"/>';
                            }

                          }          

                          $texto .= "<span>" .  $value->name . "</span></a> </li>";

                          if($key >= $limite - 1 ){ break;}
                        }

                        $texto .= '</ul>';

                    }

                break;

                case "hermanas":

                    if(!empty( $cat_hermanas )){

                      $texto = fwp_loop_hermanas($cat_hermanas,$limite,$esta_cat,$excluir,$estilado);

                    }else if($esta_cat->parent == 0){ //is a top category

                      $cat_hermanas = get_terms(array('taxonomy' => 'category', 'parent' => 0,'hide_empty' => false) );

                      $texto = fwp_loop_hermanas($cat_hermanas,$limite,$esta_cat,$excluir,$estilado);

                    }

                break;

                case "padres":

                if(!empty( $cat_padre ) && isset($cat_padre->parent) ){

                    if($cat_padre->parent == 0){ //show top level pages

                       $cat_hermanas_de_padre = get_terms(array('taxonomy' => 'category', 'parent' => 0,'hide_empty' => false) );

                    }else{

                        $cat_abuela = get_category( $cat_padre->parent  );
                        $cat_hermanas_de_padre = get_terms(array('taxonomy' => 'category', 'parent' => $cat_abuela->term_id ,'hide_empty' => false) );

                    }         
                      
                    //excluyo cats no deseadas  
                    if($excluir !== ""){
                      $cat_hermanas_de_padre = fwd_excluir_categorias($cat_hermanas_de_padre,$excluir);  
                    }

                    //barajo, recorto y ordeno
                    $cat_hermanas_de_padre = fwp_barajar_con_semilla($cat_hermanas_de_padre,$cat_id);
                    $cat_hermanas_de_padre = array_slice($cat_hermanas_de_padre,0,$limite);
                    usort($cat_hermanas_de_padre, 'fwp_compare_by_name');
                      
                    $texto = '<ul class="fwd-ul">';

                    foreach ($cat_hermanas_de_padre as $key => $value) { 

                      $texto .= '<li> <a href="' . get_category_link( get_category( $value )->term_id )   . '">';

                      if($estilado){

                        $custom_res = $wpdb->get_results("select meta_value
                        FROM {$wpdb->termmeta}
                        WHERE meta_key = 'imagen_destacada'
                        AND term_id = '$value->term_id'
                        LIMIT 1;"
                        );

                        if($custom_res[0]->meta_value !== ""){
                           $esta_imagen_src = wp_get_attachment_image_src($custom_res[0]->meta_value, 'thumbnail');
                           $texto .= '<img src="'. $esta_imagen_src[0] . '"/>';
                        }

                      }

                      $texto .= "<span>" . get_category( $value )->name . "</span></a> </li>";

                      if($key >= $limite - 1 ){break;}

                    }

                    $texto .= '</ul>';
                  
                }

                break;

                default: break;

            }//switch
   
    } //if

  return $texto;

}

add_shortcode( 'fwp_relatedcats', 'fwp_related_categories' );


?>
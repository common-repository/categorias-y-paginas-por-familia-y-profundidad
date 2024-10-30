<?php

// Add Shortcode
function fwp_related_pages( $atts, $pages_hermanas ) {

// Attributes
 extract(shortcode_atts(array(
        'tipo' => 'hermanas',
        'limite' => 5,
        'page' => 'page',
        'excluir' => "",
        'estilado' => ""
    ), $atts));
    
  $texto = '';

  //coger la página por argumento o identificarla
  if($page !== 'page'){  $esta_page = (int)$page;  }
  else{  $esta_page = get_the_ID();  }
    
   
  if( is_integer( $esta_page ) ) {

		$limite = ($limite > 0) ? (int)$limite : 1;

		if( !is_array($excluir) ){
			$excluir = explode(",", $excluir);
		}
		//excluyo page actual también de sacarla en su misma página
		array_push($excluir, $esta_page);

		// detectar la profundidad de la página
		$page_ancestrors = get_post_ancestors($esta_page); //el primero es el inmediatamente superior


		// sacar la familia
		$page_padre = !empty($page_ancestrors) ? $page_ancestrors[0] : '';
		$hijas_args = array('post_parent' => $esta_page, 'post_type'   => 'page', 'numberposts' => -1, 'post_status' => 'publish');
		$pages_hijas = get_children( $hijas_args );
		$pages_hermanas = get_pages(array('parent' => $page_padre));


		switch ($tipo) {

		    case 'padres': 
		        if(!empty( $page_padre )){

		            if( isset($page_ancestrors[1]) ){

		                $page_abuela = $page_ancestrors[1];

		                $abuelas_args = array('post_parent' => $page_abuela, 'post_type'   => 'page', 'numberposts' => -1, 'post_status' => 'publish');
		                $pages_hermanas_de_padre = get_children( $abuelas_args );

		            }else{ //show top level pages
		            	
		            	$top_level_pages = array('parent' => 0, 'post_type'   => 'page', 'numberposts' => -1, 'post_status' => 'publish');

		                $pages_hermanas_de_padre = get_pages($top_level_pages);
		            
		            }  
		              		           
		            //excluyo paginas no deseadas
					if($excluir !== ""){
						$pages_hermanas_de_padre = fwd_excluir_paginas($pages_hermanas_de_padre,$excluir);
					}

					//barajo, recorto y ordeno
		      		$pages_hermanas_de_padre = fwp_barajar_con_semilla($pages_hermanas_de_padre,$esta_page);
		      		$pages_hermanas_de_padre = array_slice($pages_hermanas_de_padre,0,$limite);
		      		usort($pages_hermanas_de_padre, 'fwp_compare_by_post_title');

		            $texto .= fwp_loop_pages($pages_hermanas_de_padre,$texto,$limite,$estilado);

		        }

		    break;

		    case 'hermanas':
		        if(!empty( $pages_hermanas )){


		            //excluyo paginas no deseadas
		            if($excluir !== ""){
						$pages_hermanas = fwd_excluir_paginas($pages_hermanas,$excluir);
					}

		            //barajo, recorto y ordeno
		          	$pages_hermanas = fwp_barajar_con_semilla($pages_hermanas,$esta_page);
		          	$pages_hermanas = array_slice($pages_hermanas,0,$limite);
		          	usort($pages_hermanas, 'fwp_compare_by_post_title');

		            $texto .= fwp_loop_pages($pages_hermanas,$texto,$limite,$estilado);

		        }

		    break;

		    case 'hijas': 
		        if(!empty($pages_hijas)){

					//excluyo paginas no deseadas                      
					if($excluir !== ""){
						$pages_hijas = fwd_excluir_paginas($pages_hijas,$excluir);
					}

					//barajo, recorto y ordeno
					$pages_hijas = fwp_barajar_con_semilla($pages_hijas,$esta_page);
					$pages_hijas = array_slice($pages_hijas,0,$limite);
					usort($pages_hijas, 'fwp_compare_by_post_title');

					$texto .= fwp_loop_pages($pages_hijas,$texto,$limite,$estilado);

		        }

		    break;

		    default: break;
		}//switch
   

    } //if

    return $texto;
    
}

add_shortcode( 'fwp_relatedpages', 'fwp_related_pages' );



?>
<?php

class Fwp_related_pages extends WP_Widget {

  // Main constructor
  public function __construct() {
    parent::__construct(
      'fwp_related_pages',
      __( 'Pages per family', 'categorias-y-paginas-por-familia-y-profundidad' ),
      array(
        'customize_selective_refresh' => true,
      )
    );
  }

  // The widget form (for the backend )
  public function form( $instance ) {


    // Set widget defaults
    $defaults = array(
      'title'    => '',
      'limite_cero'     => '',
      'excluir_pages'     => '',
      'limite_uno'     => '',
      'limite_dos'     => '',
      'limite_tres'     => '',
      'limite_cuatro'     => '',
      'select_cero'   => '',
      'select_uno'   => '',
      'select_dos'   => '',
      'select_tres'   => '',
      'select_cuatro'   => '',
      'display_something'   => '',
    );
    
    // Parse current settings with defaults
    extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

    <?php // Widget Title ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>


    <?php // Display always something ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'display_something' ); ?>"><?php _e( 'Try to show something when no selector found', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <select name="<?php echo $this->get_field_name( 'display_something' ); ?>" id="<?php echo $this->get_field_id( 'display_something' ); ?>" class="widefat" style="width: 100px;">
      <?php
      // Your options array
      $options = array(
        'yes'        => __( 'yes', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'no' => __( 'no', 'categorias-y-paginas-por-familia-y-profundidad' )
      );
      // Loop through options and add each one to the select dropdown
      foreach ( $options as $key => $name ) {
        echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $display_something, $key, false ) . '>'. $name . '</option>';
      } ?>
      </select>
    </p>

    <?php // Excluir páginas ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'excluir_pages' ) ); ?>"><?php _e( 'Exclude pages (IDS separated by comma):', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'excluir_pages' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excluir_pages' ) ); ?>" type="text" value="<?php echo esc_attr( $excluir_pages ); ?>" style="width: 95%;" />
    </p>

    <?php // Limit Field cero ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'limite_cero' ) ); ?>"><?php _e( 'top pages limit:', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limite_cero' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limite_cero' ) ); ?>" type="number" value="<?php echo esc_attr( $limite_cero ); ?>" style="width: 45px;" />
    </p>

    <?php // Select ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'select_cero' ); ?>"><?php _e( 'show in top pages', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <select name="<?php echo $this->get_field_name( 'select_cero' ); ?>" id="<?php echo $this->get_field_id( 'select_cero' ); ?>" class="widefat" style="width: 100px;">
      <?php
      // Your options array
      $options = array(
        ''        => __( 'Select', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'padres' => __( 'Parents', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hermanas' => __( 'Siblings', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hijas' => __( 'Daughters', 'categorias-y-paginas-por-familia-y-profundidad' ),
      );
      // Loop through options and add each one to the select dropdown
      foreach ( $options as $key => $name ) {
        echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select_cero, $key, false ) . '>'. $name . '</option>';
      } ?>
      </select>
    </p>



    <?php // Limit Field one ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'limite_uno' ) ); ?>"><?php _e( 'depth limit 1:', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limite_uno' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limite_uno' ) ); ?>" type="number" value="<?php echo esc_attr( $limite_uno ); ?>" style="width: 45px;" />
    </p>

    <?php // Select ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'select_uno' ); ?>"><?php _e( 'show in depth 1', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <select name="<?php echo $this->get_field_name( 'select_uno' ); ?>" id="<?php echo $this->get_field_id( 'select_uno' ); ?>" class="widefat" style="width: 100px;">
      <?php
      // Your options array
      $options = array(
        ''        => __( 'Select', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'padres' => __( 'Parents', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hermanas' => __( 'Siblings', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hijas' => __( 'Daughters', 'categorias-y-paginas-por-familia-y-profundidad' ),
      );
      // Loop through options and add each one to the select dropdown
      foreach ( $options as $key => $name ) {
        echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select_uno, $key, false ) . '>'. $name . '</option>';
      } ?>
      </select>
    </p>



        <?php // Limit Field two ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'limite_dos' ) ); ?>"><?php _e( 'depth limit 2:', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limite_dos' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limite_dos' ) ); ?>" type="number" value="<?php echo esc_attr( $limite_dos ); ?>" style="width: 45px;" />
    </p>

    <?php // Select ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'select_dos' ); ?>"><?php _e( 'show in depth 2', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <select name="<?php echo $this->get_field_name( 'select_dos' ); ?>" id="<?php echo $this->get_field_id( 'select_dos' ); ?>" class="widefat" style="width: 100px;">
      <?php
      // Your options array
      $options = array(
        ''        => __( 'Select', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'padres' => __( 'Parents', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hermanas' => __( 'Siblings', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hijas' => __( 'Daughters', 'categorias-y-paginas-por-familia-y-profundidad' ),
      );
      // Loop through options and add each one to the select dropdown
      foreach ( $options as $key => $name ) {
        echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select_dos, $key, false ) . '>'. $name . '</option>';
      } ?>
      </select>
    </p>



    <?php // Limit Field three ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'limite_tres' ) ); ?>"><?php _e( 'depth limit 3:', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limite_tres' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limite_tres' ) ); ?>" type="number" value="<?php echo esc_attr( $limite_tres ); ?>" style="width: 45px;" />
    </p>

    <?php // Select ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'select_tres' ); ?>"><?php _e( 'show in depth 3', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <select name="<?php echo $this->get_field_name( 'select_tres' ); ?>" id="<?php echo $this->get_field_id( 'select_tres' ); ?>" class="widefat" style="width: 100px;">
      <?php
      // Your options array
      $options = array(
        ''        => __( 'Select', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'padres' => __( 'Parents', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hermanas' => __( 'Siblings', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hijas' => __( 'Daughters', 'categorias-y-paginas-por-familia-y-profundidad' ),
      );
      // Loop through options and add each one to the select dropdown
      foreach ( $options as $key => $name ) {
        echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select_tres, $key, false ) . '>'. $name . '</option>';
      } ?>
      </select>
    </p>

  <?php // Limit Field Four ?>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'limite_cuatro' ) ); ?>"><?php _e( 'depth limit 4:', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limite_cuatro' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limite_cuatro' ) ); ?>" type="number" value="<?php echo esc_attr( $limite_cuatro ); ?>" style="width: 45px;" />
    </p>

    <?php // Select ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'select_cuatro' ); ?>"><?php _e( 'show in depth 3', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <select name="<?php echo $this->get_field_name( 'select_cuatro' ); ?>" id="<?php echo $this->get_field_id( 'select_cuatro' ); ?>" class="widefat" style="width: 100px;">
      <?php
      // Your options array
      $options = array(
        ''        => __( 'Select', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'padres' => __( 'Parents', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hermanas' => __( 'Siblings', 'categorias-y-paginas-por-familia-y-profundidad' ),
        'hijas' => __( 'Daughters', 'categorias-y-paginas-por-familia-y-profundidad' ),
      );
      // Loop through options and add each one to the select dropdown
      foreach ( $options as $key => $name ) {
        echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select_cuatro, $key, false ) . '>'. $name . '</option>';
      } ?>
      </select>
    </p>

  <?php }




  // Update widget settings
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
    $instance['excluir_pages']     = isset( $new_instance['excluir_pages'] ) ? wp_strip_all_tags( $new_instance['excluir_pages'] ) : '';
    $instance['limite_cero']     = isset( $new_instance['limite_cero'] ) ? wp_strip_all_tags( $new_instance['limite_cero'] ) : '';
    $instance['limite_uno']     = isset( $new_instance['limite_uno'] ) ? wp_strip_all_tags( $new_instance['limite_uno'] ) : '';
    $instance['limite_dos']     = isset( $new_instance['limite_dos'] ) ? wp_strip_all_tags( $new_instance['limite_dos'] ) : '';
    $instance['limite_tres']     = isset( $new_instance['limite_tres'] ) ? wp_strip_all_tags( $new_instance['limite_tres'] ) : '';
    $instance['limite_cuatro']     = isset( $new_instance['limite_cuatro'] ) ? wp_strip_all_tags( $new_instance['limite_cuatro'] ) : '';
    $instance['select_cero']   = isset( $new_instance['select_cero'] ) ? wp_strip_all_tags( $new_instance['select_cero'] ) : '';
    $instance['select_uno']   = isset( $new_instance['select_uno'] ) ? wp_strip_all_tags( $new_instance['select_uno'] ) : '';
    $instance['select_dos']   = isset( $new_instance['select_dos'] ) ? wp_strip_all_tags( $new_instance['select_dos'] ) : '';
    $instance['select_tres']   = isset( $new_instance['select_tres'] ) ? wp_strip_all_tags( $new_instance['select_tres'] ) : '';
    $instance['select_cuatro']   = isset( $new_instance['select_cuatro'] ) ? wp_strip_all_tags( $new_instance['select_cuatro'] ) : '';
    $instance['display_something']   = isset( $new_instance['display_something'] ) ? wp_strip_all_tags( $new_instance['display_something'] ) : '';
    return $instance;
  }


  // Display the widget
    public function widget( $args, $instance ) {
      
      extract( $args );

      // Id de la página actual
      $esta_page = get_the_ID();

      //show only in pages
      if (is_page($esta_page)) {


          // Check the widget options
          $title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
          $excluir_pages     = isset( $instance['excluir_pages'] ) ? $instance['excluir_pages'] : "";
          $limite_cero     = isset( $instance['limite_cero'] ) ? (int)$instance['limite_cero'] : 1;
          $limite_uno     = isset( $instance['limite_uno'] ) ? (int)$instance['limite_uno'] : 1;
          $limite_dos     = isset( $instance['limite_dos'] ) ? (int)$instance['limite_dos'] : 1;
          $limite_tres     = isset( $instance['limite_tres'] ) ? (int)$instance['limite_tres'] : 1;
          $limite_cuatro     = isset( $instance['limite_cuatro'] ) ? (int)$instance['limite_cuatro'] : 1;
          $select_cero   = isset( $instance['select_cero'] ) ? $instance['select_cero'] : '';
          $select_uno   = isset( $instance['select_uno'] ) ? $instance['select_uno'] : '';
          $select_dos   = isset( $instance['select_dos'] ) ? $instance['select_dos'] : '';
          $select_tres   = isset( $instance['select_tres'] ) ? $instance['select_tres'] : '';
          $select_cuatro   = isset( $instance['select_cuatro'] ) ? $instance['select_cuatro'] : '';
          $display_something   = isset( $instance['display_something'] ) ? $instance['display_something'] : 'yes';


          // WordPress core before_widget hook (always include )
          echo $before_widget;

          // Display the widget
          echo '<div class="widget-text wp_widget_plugin_box">';

          // Display widget title if defined
          if( $title ){ echo $before_title . $title . $after_title; }



          // detectar la profundidad de la página
          $page_ancestrors = get_post_ancestors($esta_page); //el primero es el inmediatamente superior
          $page_depth = sizeof($page_ancestrors);


          // sacar la familia
          $page_padre = !empty($page_ancestrors) ? $page_ancestrors[0] : '';
          $hijas_args = array('post_parent' => $esta_page, 'post_type'   => 'page', 'numberposts' => -1, 'post_status' => 'publish');
          $pages_hijas = get_children( $hijas_args );
          $pages_hermanas = get_pages( array('parent' => $page_padre)  );


      }//if is_page()


  if (!function_exists('mostrar_paginas')) {
    
    function mostrar_paginas($tipo_familia,$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite,$display_something,$segunda_llamada = false, $excluir_pages = ""){

          $limite = ($limite > 0) ? (int)$limite : 1;
          if( !is_array($excluir_pages) ){
            $excluir_pages = explode(",", $excluir_pages);
          }

          switch ($tipo_familia) {
            
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
    	                   
    	                    echo '<ul>';

                          
                          //excluyo paginas no deseadas   
                          if($excluir_pages !== ""){                   
                            $pages_hermanas_de_padre = fwd_excluir_paginas($pages_hermanas_de_padre,$excluir_pages);
                          }

                          //barajo, recorto y ordeno
                          $pages_hermanas_de_padre = fwp_barajar_con_semilla($pages_hermanas_de_padre,$esta_page);
                          $pages_hermanas_de_padre = array_slice($pages_hermanas_de_padre,0,$limite);
                          usort($pages_hermanas_de_padre, 'fwp_compare_by_post_title');
                

    	                    foreach ($pages_hermanas_de_padre as $key => $value) { 

    		                    echo '<li> <a href="' . get_permalink($value->ID) . '">' . $value->post_title . "</a> </li> ";		                  

    		                    if($key >= $limite){break;}
    		                }

    		                echo '</ul>';
    	            	
                    }

                break;

                case 'hermanas': 
                    if(!empty( $pages_hermanas ) && sizeof($pages_hermanas) > 1){
                        echo '<ul>';

                        //excluyo paginas no deseadas   
                        if($excluir_pages !== ""){                   
                          $pages_hermanas = fwd_excluir_paginas($pages_hermanas,$excluir_pages);
                        }

                        //barajo, recorto y ordeno
                        $pages_hermanas = fwp_barajar_con_semilla($pages_hermanas,$esta_page);
                        $pages_hermanas = array_slice($pages_hermanas,0,$limite);
                        usort($pages_hermanas, 'fwp_compare_by_post_title');
                     

                        foreach ($pages_hermanas as $key => $value) { 

                            //excluyo page actual
                            if( $value->ID !== $esta_page){

                              echo '<li> <a href="' . get_permalink($value->ID) . '">' . $value->post_title . "</a> </li> ";

                            }else{
                              $limite++;
                            }

                            if($key >= $limite){break;}
                        }
                     
                      echo '</ul>';
                    }else{

                        if($display_something == "yes"){
                             if($segunda_llamada == false){
                              mostrar_paginas("hijas",$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite,$display_something,true,$excluir_pages);
                            }else{
                              mostrar_paginas("padres",$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite,$display_something,false,$excluir_pages);
                            }
                        }
                       
                    }

                break;

                case 'hijas': 
                    if(!empty($pages_hijas)){

                      echo '<ul>';

                      //excluyo paginas no deseadas   
                      if($excluir_pages !== ""){                   
                        $pages_hijas = fwd_excluir_paginas($pages_hijas,$excluir_pages);
                      }

                      //barajo, recorto y ordeno
                      $pages_hijas = fwp_barajar_con_semilla($pages_hijas,$esta_page);
                      $pages_hijas = array_slice($pages_hijas,0,$limite);
                      usort($pages_hijas, 'fwp_compare_by_post_title');
                  

                      foreach ($pages_hijas as $key => $value) {
                      	
                        echo '<li> <a href="' . get_permalink($value->ID) . '">' . $value->post_title . "</a> </li> ";
                        if($key >= $limite){ break;}
                      }

                      echo '</ul>';

                    }else{

                        if($display_something == "yes"){
                             if($segunda_llamada == false){
                              mostrar_paginas("hermanas",$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite,$display_something,true,$excluir_pages);
                            }else{
                              mostrar_paginas("padres",$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite,$display_something,false,$excluir_pages);
                            }
                        }
                       
                    }

                break;

                default: break;
          }
       
    }
  }




    // lógica según la profundidad en la que se esté
    if (is_page($esta_page)) {

        switch ($page_depth) {
            case 0:   mostrar_paginas($select_cero,$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite_cero,$display_something,false,$excluir_pages);  break;
            case 1:   mostrar_paginas($select_uno,$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite_uno,$display_something,false,$excluir_pages);  break;
            case 2:   mostrar_paginas($select_dos,$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite_dos,$display_something,false,$excluir_pages);  break;
            case 3:   mostrar_paginas($select_tres,$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite_tres,$display_something,false,$excluir_pages);  break;
            case 4:   mostrar_paginas($select_cuatro,$page_padre,$page_ancestrors,$pages_hijas,$pages_hermanas,$esta_page,$limite_cuatro,$display_something,false,$excluir_pages);  break;
            
            default: break;
        }

      echo '</div>';
      // WordPress core after_widget hook (always include )
      echo $after_widget;   
       
    }

  }// widget function

}//class




// Register the widget
function registrar_widget_fwp_related_pages() {
  register_widget( 'fwp_related_pages' );
}

add_action( 'widgets_init', 'registrar_widget_fwp_related_pages' );

?>
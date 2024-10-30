<?php

class Fwp_related_cats extends WP_Widget {

  // Main constructor
  public function __construct() {
    parent::__construct(
      'fwp_related_cats',
      __( 'Categories per family', 'categorias-y-paginas-por-familia-y-profundidad' ),
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
      'excluir_cats'     => '',
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


    <?php // Excluir categorías ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'excluir_cats' ) ); ?>"><?php _e( 'Exclude cats (IDS separated by comma):', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'excluir_cats' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excluir_cats' ) ); ?>" type="text" value="<?php echo esc_attr( $excluir_cats ); ?>" style="width: 95%;" />
    </p>

    <?php // Limit Field cero ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'limite_cero' ) ); ?>"><?php _e( 'top category limit:', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limite_cero' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limite_cero' ) ); ?>" type="number" value="<?php echo esc_attr( $limite_cero ); ?>" style="width: 45px;" />
    </p>

    <?php // Select ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'select_cero' ); ?>"><?php _e( 'show in top categ.', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
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

  <?php // Limit Field four ?>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'limite_cuatro' ) ); ?>"><?php _e( 'depth limit 4:', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limite_cuatro' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limite_cuatro' ) ); ?>" type="number" value="<?php echo esc_attr( $limite_cuatro ); ?>" style="width: 45px;" />
    </p>

    <?php // Select ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'select_cuatro' ); ?>"><?php _e( 'show in depth 4', 'categorias-y-paginas-por-familia-y-profundidad' ); ?></label>
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
    $instance['excluir_cats']     = isset( $new_instance['excluir_cats'] ) ? wp_strip_all_tags( $new_instance['excluir_cats'] ) : '';
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

  // show only in categories
  if (is_category()) {

      // Check the widget options
      $title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
      $excluir_cats     = isset( $instance['excluir_cats'] ) ? $instance['excluir_cats'] : "";
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
      if ( $title ) { echo $before_title . $title . $after_title; }


      // datos de la categoría
      $esta_cat = get_category(get_query_var('cat'));

      $cat_id = $esta_cat->term_id;
      $cat_name = $esta_cat->name;
      $cat_slug = $esta_cat->slug;
      $cat_tax = $esta_cat->taxonomy;
      $cat_parent = $esta_cat->parent;
      //$cat_category_parent = $esta_cat->category_parent;



      // detectar la profundidad de la categoria
      $cats_str = get_category_parents($cat_id, false, '%#%');
      $cats_array = explode('%#%', $cats_str);
      $cat_depth = sizeof($cats_array)-2;


      // sacar la familia
      $cat_padre = !empty($esta_cat->parent) ?  get_category( $esta_cat->parent  ) : '';
      $cat_hijas = get_terms(array('taxonomy' => 'category', 'parent' => $cat_id,'hide_empty' => false) );

      if(isset($cat_padre->term_id)){     

        $cat_hermanas = get_terms(array('taxonomy' => 'category', 'parent' => $cat_padre->term_id,'hide_empty' => false) );

      }else{ $cat_hermanas = ''; }

  }

  if (!function_exists('mostrar_categorias')) {
    
      function mostrar_categorias($tipo_familia,$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite,$display_something,$segunda_llamada = false, $excluir_cats = ""){

            $limite = ($limite > 0) ? (int)$limite : 1;
            if( !is_array($excluir_cats) ){
              $excluir_cats = explode(",", $excluir_cats);
            }


            switch ($tipo_familia) {
              
                  case 'padres': 
                      if(!empty( $cat_padre ) && isset($cat_padre->parent) ){

                          if($cat_padre->parent == 0){ //show top level pages

                             $cat_hermanas_de_padre = get_terms(array('taxonomy' => 'category', 'parent' => 0,'hide_empty' => false) );

                          }else{

                              $cat_abuela = get_category( $cat_padre->parent  );
                              $cat_hermanas_de_padre = get_terms(array('taxonomy' => 'category', 'parent' => $cat_abuela->term_id ,'hide_empty' => false) );

                          }         
      	                    
      	                  echo '<ul>';

                          //excluyo cats no deseadas
                          if($excluir_cats !== ""){
                            $cat_hermanas_de_padre = fwd_excluir_categorias($cat_hermanas_de_padre,$excluir_cats);
                          }

                          //barajo, recorto y ordeno
                          $cat_hermanas_de_padre = fwp_barajar_con_semilla($cat_hermanas_de_padre,$esta_cat->term_id);
                          $cat_hermanas_de_padre = array_slice($cat_hermanas_de_padre,0,$limite);
                          usort($cat_hermanas_de_padre, 'fwp_compare_by_name');

      	                  foreach ($cat_hermanas_de_padre as $key => $value) { 

      		                  //excluyo cat actual
      		                  echo '<li> <a href="' . get_category_link( get_category( $value )->term_id )  . '">' . get_category( $value )->name . "</a> </li> ";


      		                  if($key >= $limite){break;}

      		                }

      		                echo '</ul>';
      	            	  
                      }

                  break;

                  case 'hermanas':
                      if(!empty( $cat_hermanas ) && sizeof($cat_hermanas) > 1){

                        echo fwp_loop_hermanas($cat_hermanas,$limite,$esta_cat,$excluir_cats);

                      }else if($esta_cat->parent == 0){ //is a top category

                        $cat_hermanas = get_terms(array('taxonomy' => 'category', 'parent' => 0,'hide_empty' => false) );
                        
                        echo fwp_loop_hermanas($cat_hermanas,$limite,$esta_cat,$excluir_cats);

                      }else{

                        if($display_something == "yes"){
                             if($segunda_llamada == false){
                              mostrar_categorias('hijas',$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite,$display_something,true,$excluir_cats);
                            }else{
                              mostrar_categorias('padres',$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite,$display_something,false,$excluir_cats);
                            }
                        }
                       
                      }

                  break;

                  case 'hijas': 
                      if(!empty($cat_hijas)){                        

                        //excluyo cats no deseadas                      
                        if($excluir_cats !== ""){
                          $cat_hijas = fwd_excluir_categorias($cat_hijas,$excluir_cats);
                        }

                        //barajo, recorto y ordeno  
                        $cat_hijas = fwp_barajar_con_semilla($cat_hijas,$esta_cat->term_id);
                        $cat_hijas = array_slice($cat_hijas,0,$limite);
                        usort($cat_hijas, 'fwp_compare_by_name');

                        echo '<ul>';

                        foreach ($cat_hijas as $key => $value) {
                          echo '<li> <a href="' . get_category_link( get_category( $value )->term_id ) . '">' . get_category( $value )->name . "</a> </li> ";


                          if($key >= $limite){ break;}
                        }

                        echo '</ul>';

                      }else{ 

                        if($display_something == "yes"){
                            if($segunda_llamada == false){
                              mostrar_categorias('hermanas',$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite,$display_something,true,$excluir_cats);
                            }else{
                              mostrar_categorias('padres',$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite,$display_something,false,$excluir_cats);
                            }
                        }
                        
                      }

                  break;

                  default: break;
            }
         
      }// mostrar_categorias()
   }



    // lógica según la profundidad en la que se esté
    if (is_category()) {

        switch ($cat_depth) {
            case 0:   mostrar_categorias($select_cero,$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite_cero,$display_something,false,$excluir_cats);  break;
            case 1:   mostrar_categorias($select_uno,$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite_uno,$display_something,false,$excluir_cats);  break;
            case 2:   mostrar_categorias($select_dos,$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite_dos,$display_something,false,$excluir_cats);  break;
            case 3:   mostrar_categorias($select_tres,$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite_tres,$display_something,false,$excluir_cats);  break;
            case 4:   mostrar_categorias($select_cuatro,$cat_padre,$cat_hijas,$cat_hermanas,$esta_cat,$limite_cuatro,$display_something,false,$excluir_cats);  break;
            
            default: break;
        }

        echo '</div>';
        // WordPress core after_widget hook (always include )
        echo $after_widget;

    }


  }// widget function

}// class




// Register the widget
function registrar_widget_fwp_related_cats() {
  register_widget( 'fwp_related_cats' );
}

add_action( 'widgets_init', 'registrar_widget_fwp_related_cats' );



?>
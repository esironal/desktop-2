  <?php get_header(); ?>
    
  
    	<?php 
		//Adds the comic book category on a list
		wp_tag_cloud( array( 
				'taxonomy' => 'comics', 
				'format' => 'list',
				'orderby' => 'count',
				'smallest' => 1.2, 
   				'largest' => 1.2,
    			'unit' => 'em', 
				'topic_count_text_callback' => 'my_count_text_callback'
				) ); 
				
				//change the default title from topics to pages
				function my_count_text_callback($count)
				  {
					  return sprintf(_n('%s page', '%s pages', $count), number_format_i18n($count));
				  }
								  
				?>
               <?php /*?><?php 
				 $categories =  get_categories(array( 'taxonomy' => 'comics' ));
				 foreach ($categories as $category) {
					$tax_term_id = $category->term_taxonomy_id;
					$images = get_option('taxonomy_image_plugin');
					echo wp_get_attachment_image( $images[$tax_term_id], 'medium' );
				 }
				?><?php */?>
    

<?php get_footer(); ?>

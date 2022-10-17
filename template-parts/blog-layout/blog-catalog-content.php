<div class="brator-blog-listing-single-item-area list-type-one">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="type-post">
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="brator-blog-listing-single-item-thumbnail">
				<a class="blog-listing-single-item-thumbnail-link" href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail( 'brator-blog-list' ); ?></a>
			</div>
			<?php endif; ?>
			<div class="brator-blog-listing-single-item-content">
                <?php
                $upload_pdf = get_field( "upload_pdf", get_the_id() );
                $preview_image = get_field( "preview_image", get_the_id() );
                ?>
                <a href="<?php echo $upload_pdf;?>" target="_blank">
                    <img src="<?php echo $preview_image;?>" alt="image" class="img-fluid">
                    <h4 class="brator-blog-listing-single-item-title"><?php echo get_the_title();?></h4>
                </a>                
			</div>
		</div>
	</div>
</div>

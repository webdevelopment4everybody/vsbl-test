<?php get_header();?>
<?php
$hero = get_field('pirma_sekcija');
if( $hero ): ?>
<section class="hero">
    <div class="container first-section">
        <div class="row">
            <div class="col-lg-4 col-12">
                <img class="logo" src="<?php echo esc_url( $hero['logotipas']['url'] ); ?>" alt="<?php echo esc_attr( $hero['logotipas']['alt'] ); ?>" />
            </div>
            <div class="col-lg-8 col-12 right-side">
                <h1><?php echo $hero['pavadinimas']; ?></h1>
                <p><?php echo $hero['aprasymas']; ?></p>
                <div><a href="<?php echo esc_url( $hero['mygtukas']['url'] ); ?>"><?php echo esc_html( $hero['mygtukas']['title'] ); ?><img src="<?php echo get_template_directory_uri();?>/assets/images/arrow.png" alt=""></a></div>
                <img class="colored" src="<?php echo esc_url( $hero['paveikslelis_kaireje']['url'] ); ?>" alt="<?php echo esc_attr( $hero['paveikslelis_kaireje']['alt'] ); ?>" />
                <img class="uncolored" src="<?php echo esc_url( $hero['paveikslelis_desineje']['url'] ); ?>" alt="<?php echo esc_attr( $hero['paveikslelis_desineje']['alt'] ); ?>" />
            </div>
        </div>
    </div>
</section>  
<?php endif; ?> 
<section>
    <!-- desktop -->
    <div class="container-fluid desktop">
        <div class="row">
            <?php 
                $counter = 0; //Set up a counter

                $loop = new WP_Query( array( 'post_type' => 'single-box', 'posts_per_page' => 3,'order'=>'ASC' ) ); 
                
                while ( $loop->have_posts() ) : $loop->the_post();   $counter++;
            ?>
            <?php if ($counter % 2 == 0): ?>
                <div class="col-lg-4 col-12 single-box bg-dark-blue">
                    <h2><?php the_title();?></h2>
                    <p><?php the_field('aprasymas');?></p>  
                    <a href=<?php echo get_permalink();?>><?php the_field('mygtukas');?><img src="<?php echo get_template_directory_uri();?>/assets/images/arrow.png" alt=""></a>
                    <?php 
                    $image = get_field('paveikslelis');
                    if( !empty( $image ) ): ?>
                        <img class="icon" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="col-lg-4 col-12 single-box bg-light-blue">
                    <h2><?php the_title();?></h2>
                    <p><?php the_field('aprasymas');?></p>  
                    <a href=<?php echo get_permalink();?>><?php the_field('mygtukas');?><img src="<?php echo get_template_directory_uri();?>/assets/images/arrow.png" alt=""></a>
                    <?php 
                    $image = get_field('paveikslelis');
                    if( !empty( $image ) ): ?>
                        <img class="icon" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            <?php endif ?>

            <?php endwhile; ?>
        </div>
    </div>


<!-- mobile -->
    <div class="container-fluid mobile">
        <div class="row">
             <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php 
                        $loop = new WP_Query( array( 'post_type' => 'single-box', 'posts_per_page' => 3,'order'=>'ASC' ) ); 
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                    ?>
                        <div class="swiper-slide">
                            <div class="col-lg-4 col-12 single-box">
                            <h2><?php the_title();?></h2>
                            <p><?php the_field('aprasymas');?></p>  
                            <a href=<?php echo get_permalink();?>><?php the_field('mygtukas');?><img src="<?php echo get_template_directory_uri();?>/assets/images/arrow.png" alt=""></a>
                            <?php 
                            $image = get_field('paveikslelis');
                            if( !empty( $image ) ): ?>
                                <img class="icon" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                        <?php endwhile; ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

</section>   
<?php get_footer();?>
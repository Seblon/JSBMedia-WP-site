<?php get_header(); ?>

<div class="container mt4">
      <main>
         <span class="line top-left"></span>
         <span class="line top-right"></span>
         <span class="line btm-right"></span>
         <span class="line btm-left"></span>
         <article class="semi-trans">
            <div class="image-frame">
               <img src="<?php echo get_theme_file_uri('/images/me-clean-bw_medium.png') ?>" alt="Me myself in a selfie">
            </div>
            <h1 class="mega-title">Hey You :)</h1>
            <p class="content_copytext">
               My name is <span class="hilight--red hilight--semi-bold">Sebastian</span> and I'm an educated <span
                  class="hilight--semi-bold">Web Content Manager</span> and
               <span class="hilight--semi-bold">Designer</span>.
            </p>
            <p class="content_copytext">
               That means I'm highly skilled in <span class="hilight--semi-bold">UX</span>, <span
                  class="hilight--semi-bold">graphic design</span> and <span class="hilight--semi-bold">front-end web
                  development</span>.
            </p>
            <div class="btn-wrapper">
               <a href="<?php echo site_url('/all-projects') ?>" class="btn btn--red">View my projects</a>
               <a href="<?php echo site_url() ?>" class="btn btn--outline">Hire Me</a>
            </div>
            <!-- The divs down below is just for practicing custom post types and may be removed later on. -->
            <div class="btn-wrapper mt3">
               <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--red">View all events</a>
            </div>
            <div class="mt3">
               <h2 class="top-title">Upcoming events</h2>

               <!-- Custom query -->
               <?php
               $today = date('Ymd');
                  $homepageEvents = new WP_Query(array(
                     'post_type' => 'event',
                     'meta_key' => 'event_date',
                     'order_by' => 'meta_value_num',
                     'meta_query' => array(
                        array(
                           'key' => 'event_date',
                           'compare' => '>=',
                           'value' => $today,
                           'type' => 'numeric'
                        )
                     )
                  ));

                  while($homepageEvents->have_posts()) {
                     $homepageEvents->the_post(); ?>
                     <div class="container">
                        <li><?php
                           $eventDate = new DateTime(get_field('event_date'));
                           echo $eventDate->format('M dS') ?> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                     </div>
                  <?php }
               ?>

            </div>
         </article>
      </main>
   </div>

<?php get_footer();

?>
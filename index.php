<?php get_header();?>

  <main id="main">
    <section class="index-image">
      <img src="<?php echo get_theme_file_uri('assets/img/mannol-index.jpg'); ?> " alt="">
    </section>

    
     <?php
    // Get all categories
    $categories = get_categories(array(
      'exclude' => array(1),
    ));

    // Check if there are any categories
    if ($categories) :
    ?>
      <section class="wk-categories">
        <div class="p-9">
          <div class="wk-categories__wrapper gap-6">
            <?php foreach ($categories as $category) : ?>
              <div class="wk-categories__item">
                  <?php echo $category->name; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    <?php endif;

    $args = array(
      'post_type' => 'produtos',
      'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
    ?>
      <section class="wk-produtos">
        <div class="p-9">
          <div class="grid grid-cols-3 gap-10">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
              <div class="wk-produtos__item">
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                  <h3><?php the_title(); ?></h3>
                </a>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </section>
    <?php endif; ?>
  </main>

<?php get_footer(); ?>
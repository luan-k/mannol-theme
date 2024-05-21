<?php get_header();?>

  <main id="main">
    <section class="index-image">
      <img src="<?php echo get_theme_file_uri('assets/img/mannol-index.jpg'); ?> " alt="">
    </section>

    <?php
    $args = array(
      'post_type' => 'produtos',
      'posts_per_page' => 3,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
    ?>
      <section class="produtos">
        <div class="container">
          <h2 class="text-center">Produtos</h2>
          <div class="grid grid-cols-3 gap-4">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
              <div class="produtos__item">
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
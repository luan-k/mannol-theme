<?php get_header(); ?>
<main id="main" class="product-archive">
    <section class="index-image">
        <img src="<?php echo get_theme_file_uri('assets/img/mannol-index.jpg'); ?>" alt="">
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
                    <div class="wk-categories__item active" id="todas">
                        Todas
                    </div>
                    <?php foreach ($categories as $category) : ?>
                        <div class="wk-categories__item" id="<?= $category->slug ?>">
                            <?php echo $category->name; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    // Define the query to get all products initially
    $args = array(
        'post_type' => 'produtos',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
    ?>
    <section class="wk-produtos">
        <div class="p-9">
            <div id="product-list" class="grid grid-cols-1 md:grid-cols-3 gap-10">
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

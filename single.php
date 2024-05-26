<?php get_header();

// Get the current post ID
$post_id = get_the_ID();

// Get the categories for this post
$categories = get_the_category($post_id);

// Get the first category
$category = $categories[0];

// Get the permalink
$permalink = get_permalink($post_id);

// Get the title
$title = get_the_title($post_id);

// Get the post thumbnail ID
$post_thumbnail_id = get_post_thumbnail_id($post_id);

// Get the post thumbnail URL
$post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full');

// Check if the URL is available
if ($post_thumbnail_url) {
    $post_thumbnail = $post_thumbnail_url[0];
} else {
    $post_thumbnail = '';
}

// Get the content
$content = get_the_content(null, false, $post_id);

// Get related posts
$args = array(
    'category__in' => array($category->term_id),
    'post__not_in' => array($post_id),
    'posts_per_page' => 5, // Number of related posts to display.
);

$related_posts = get_posts($args);

$trail = "Produtos / {$category->slug} / {$title}";

wp_reset_postdata();
?>

 <section class="single-wk-products">
    <div class="single-wk-products__trail">
        <div class="container">
            <?php echo $trail; ?>
        </div>
    </div>
    <div class="single-wk-products__title">
        <div class="container">
            <h1 class="text-center">
                <?php echo $title; ?>
            </h1>
        </div>
    </div>
    <div class="single-wk-products__image">
       <div class="container">
            <img class="m-auto w-1/3 h-auto" src="<?php echo $post_thumbnail; ?>" alt="<?php echo $title; ?>">
       </div>
    </div>
    <div class="single-wk-products__text">
        <?php echo $content; ?>
    </div>
    <div class="single-wk-products__related">
        <h2>Produtos Relacionados</h2>
        <div class="grid grid-cols-3 gap-10">
            <?php foreach ($related_posts as $post) : setup_postdata($post); ?>
                <div class="single-wk-products__related-item">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
 </section>

<?php get_footer(); ?>
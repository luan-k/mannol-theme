<?php
get_header(); ?>

<div id="primary" class="wkode-single-page-template content-area">
    <main id="main" class="wkode-single-page-template__main site-main" role="main">

        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('wkode-single-page-template__article'); ?>>

                <div class="wkode-single-page-template__body py-60">
                    <header class="container mb-28">
                        <h1 class="text-6xl font-poppins font-extrabold text-left uppercase"><?php the_title(); ?></h1>
                    </header>
                    <div class="wkode-single-page-template__content entry-content">
                        <section class="wkode-contact-block">
                            <div class="wkode-contact-block__wrapper ">
                                <header class="wkode-contact-block__title-header">
                                    <h2 class="wkode-contact-block__title">
                                        Fale conosco. A sua opinião é muito importante para nós!
                                    </h2>
                                    <h3 class="wkode-contact-block__subtitle">
                                        Horário de atendimento:
                                    </h3>
                                    <p class="wkode-contact-block__text">
                                        Segunda à sexta das: 08h00 às 18h00
                                    </p>
                                </header>
                                <div class="wkode-contact-block__form ">
                                    <?php echo do_shortcode( '[wpforms id="37" title="false"]' ); ?>
                                </div>
                            </div>

                        </section>

                    </div>
                </div>

            </article>
        <?php endwhile; ?>

    </main>
</div>

<?php
get_footer();
?>

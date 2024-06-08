        <footer class="wk-footer" id="footer">
          <div class="container grid-cols-1 md:grid-cols-3 gap-16 grid">
            <div class="wk-footer__column">
             <!--  <h3 class="wk-footer__title">Quem somos</h3> -->
              <div class="wk-footer__logo">
                <!-- <img src="<?php echo get_theme_file_uri('assets/img/logo.png'); ?>" alt="logo"> -->
                <p class="wk-footer__text">
                  A Mannol é uma marca reconhecida mundialmente por seus lubrificantes, aditivos e produtos para veículos. Na Pecmotors, somos a importadora oficial da Mannol no Brasil, garantindo que você tenha acesso aos melhores produtos para cuidar do seu carro. Confie na expertise da Mannol e conte com a Pecmotors para suas necessidades automotivas.
                </p>
              </div>
            </div>
            <div class="wk-footer__column">
              <!-- <h3 class="wk-footer__title">Produtos</h3> -->
              <div class="wk-footer__products">
                <ul class="wk-header__nav-list">
                  <?php
                  $args = array(
                    'post_type' => 'produtos',
                    'posts_per_page' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC'
                  );
                  $latest_products = new WP_Query($args);
                  while($latest_products->have_posts()) : $latest_products->the_post();
                  ?>
                  <li class="wk-header__nav-item">
                    <a href="<?php the_permalink(); ?>" class="wk-header__nav-link"><?php the_title(); ?></a>
                  </li>
                  <?php endwhile; wp_reset_query(); ?>
                </ul>
              </div>
            </div>
            <div class="wk-footer__column">
             <!--  <h3 class="wk-footer__title">Menu</h3> -->
              <div class="wk-footer__menu">
                <ul class="wk-header__nav-list">
                  <li class="wk-header__nav-item">
                    <a href="/" class="wk-header__nav-link">Início</a>
                  </li>
                  <li class="wk-header__nav-item">
                    <a href="/sobre-nos" class="wk-header__nav-link">Sobre Nós</a>
                  </li>
                  <li class="wk-header__nav-item">
                    <a href="/produtos" class="wk-header__nav-link">Produtos</a>
                  </li>
                  <li class="wk-header__nav-item">
                    <a href="/contato" class="wk-header__nav-link">Contato</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="container my-24">
            <hr class="wk-footer__ruler">
          </div>
          <div class="container flex wk-footer__icons">
            <a target="_blank" href="http://instragram.com/mannolbr"> <?php
              echo file_get_contents(get_theme_file_path('/assets/svg/instagram.svg')); ?>
            </a>
            <a href="#"> <?php
              echo file_get_contents(get_theme_file_path('/assets/svg/facebook.svg')); ?>
            </a>
            <a href="#"> <?php
              echo file_get_contents(get_theme_file_path('/assets/svg/twitter.svg')); ?>
            </a>
            <a target="_blank" href="https://www.youtube.com/@GrupoPecmotors"><?php
              echo file_get_contents(get_theme_file_path('/assets/svg/youtube.svg')); ?>
            </a>
          </div>
          <div class="wk-footer__copy">
            <div class="container text-center">
              <p>&copy; 2024 - Grupo Pecmotors Importador e distribuidor oficial do Brasil</p>
              <div class="wkode-logo">
                <a target="_blank" href="https://wkode.com.br/">
                  <?php
                  echo file_get_contents(get_theme_file_path('/assets/svg/wkode-logo-footer.svg'));
                  ?>
                </a>
              </div>
            </div>
          </div>
        </footer>
      <?php wp_footer() ?>

    </div>
  </body>
</html>
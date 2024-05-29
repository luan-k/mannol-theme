        <footer class="container" id="footer">
          <div class="grid-cols-1 md:grid-cols-3 gap-10 grid">
            <div class="footer__logo">
              <img src="<?php echo get_theme_file_uri('assets/img/logo.png'); ?>" alt="logo">
            </div>
            <div class="footer__menu">
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
                  <!-- catalogo -->
                </ul>
            </div>
          </div>
        </footer>
      <?php wp_footer() ?>

    </div>
  </body>
</html>
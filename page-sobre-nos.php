<?php
get_header();
?>

<section class="wk-banner-block mt-12">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="wk-banner-block__content" data-entrance="from-left">
                <h3 class="px-0">Quem somos</h3>
                <p class="text-3xl md:pr-24">
                    A MANNOL é uma marca alemã com mais de duas décadas de experiência no mercado de lubrificantes automotivos. Sua reputação sólida e confiança conquistada por milhões de entusiastas e profissionais de automóveis em todo o mundo a tornam uma escolha confiável. 
                    <br>
                    <br>
                    Todos os produtos MANNOL são fabricados sob rigoroso controle de qualidade, utilizando os melhores equipamentos disponíveis. A linha de produtos inclui uma ampla variedade de óleos de motor, óleos de câmbio, aditivos para óleo e combustível, além de fluidos de freio, fluidos de arrefecimento e produtos para cuidado automotivo1. Se você busca qualidade e desempenho para o seu veículo, considere os lubrificantes MANNOL para manter seu motor funcionando de forma eficiente e duradoura. 🚗💨
                </p>
            </div>
            <div class="wk-banner-block__image" data-entrance="from-right">
                <img src="<?php echo get_theme_file_uri('assets/img/quemsomosmannol.jpg'); ?>" alt="banner">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="wk-banner-block__image" data-entrance="from-bottom-left">
                <img src="<?php echo get_theme_file_uri('assets/img/quemsomosgrupo.jpg'); ?>" alt="banner">
            </div>
            <div class="wk-banner-block__content gap-7" data-entrance="from-bottom-right">
                <h3 class="px-0 md:pl-24">
                    Nosso Grupo
                </h3>
                <p class="text-3xl md:pl-24">
                    Há mais de 20 anos, o grupo PECMOTORS atua no mercado automotivo de Curitiba, região e Santa Catarina, com amplo conhecimento em manutenção preventiva no segmento de transmissões automáticas e lubrificação.
                    Somos os únicos distribuidores no Brasil dos renomados lubrificantes da marca alemã MANNOL. 
                    <br>
                    <br>
                    A MANNOL está presente em mais de 170 países e conquistou a confiança de milhões de entusiastas e profissionais de automóveis em todo o mundo. 
                    Se você busca qualidade e desempenho para o seu veículo, conte com os produtos MANNOL através do grupo PECMOTORS
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
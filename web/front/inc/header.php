<header>
    <div class="flex-wrap">
        <div id="logo">
            <?php new Header\Logo(); ?>
        </div>
        <nav>
            <?php
                new Header\NavMenu("graphic-design");
                Header\Nav::separator();
                new Header\NavMenu("illustration");
                Header\Nav::separator();
                new Header\NavMenu("contact");
            ?>
        </nav>
        <div id="languages">
            <?php
                new Header\NavLang("es");
                Header\Nav::separator();
                new Header\NavLang("en");
            ?>
        </div>
        <i class="fas fa-bars" id="burger"></i>
    </div>
    <?php Header\Main::hr(); ?>
</header>
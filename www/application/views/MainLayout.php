<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo YHtml::cssFile('master.css') ?>
        <?php echo YHtml::cssFile('header.css') ?>
        <?php echo YHtml::cssFile('menu.css') ?>

    </head>
    <body>
        <div class="fixed_navigation">
            <nav class="headerNav">
                <?php
                $list = new ListItemWidget(array(Language::$RESTAURANTS => '',
                    Language::$ABOUT => 'about',
                    Language::$LOGIN => '/Member/Login'));
                $list->render();
                ?>
            </nav>
        </div>
        <div class="wrapper content">
<?php echo $content ?>
            <div class="menu">
                <ul>
                    <li class="menu_section">
                        <div class="section_title"><a>Vorspeise</a></div>
                        <div class="columns_container">
                            <?php
                            $dish = new DishModel();
                            $dish->name = "Spring Roll";
                            $dish->thumbnail = "http://localhost:8080/application/img/tatar.jpg";
                            $dish->description = "this is Spring Roll";
                            $dish->price = "3.2";
                            $dishWidget = new MenuCardWidget($dish);
                            $dishWidget->render();
                            ?>
                            <div class="menu_card">
                                <img src="img/springRoll.jpg" />
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Sed feugiat consectetur pellentesque. Nam ac elit risus,
                                    ac blandit dui. Duis rutrum porta tortor ut convallis.
                                    Duis rutrum porta tortor ut convallis.</p>
                            </div>
                            <div class="menu_card">

                                <a href="http://localhost:8080/application/img/tatar.jpg"><img src="http://localhost:8080/application/img/tatar.jpg" /></a>

                            </div>
                            <div class="menu_card">

                                <a href="http://localhost:8080/application/img/salad.jpg"><img src="http://localhost:8080/application/img/salad.jpg" /></a>

                            </div>
                            <div class="menu_card">

                                <img src="img/fisch.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/tomaten.jpg" />

                            </div>
                        </div>


                    </li>
                    <li class="menu_section">
                        <div class="section_title"><a>Hauptspeise</a></div>
                        <div class="columns_container">
                            <div class="menu_card">
                                <img src="img/steak.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/spagetti.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/gongpao.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/fish2.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/fish3.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/lamb.jpg" />
                                <p>preis: 10€</p>

                            </div>
                            <div class="menu_card">

                                <img src="img/haishen.jpg" />

                            </div>
                        </div>


                    </li>
                    <li class="menu_section">
                        <div class="section_title"><a>Nachtisch</a></div>
                        <div class="columns_container">
                            <div class="menu_card">
                                <img src="img/springRoll.jpg" />
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Sed feugiat consectetur pellentesque. Nam ac elit risus,
                                    ac blandit dui. Duis rutrum porta tortor ut convallis.
                                    Duis rutrum porta tortor ut convallis.</p>
                            </div>
                            <div class="menu_card">

                                <img src="img/tatar.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/salad.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/fisch.jpg" />

                            </div>
                            <div class="menu_card">

                                <img src="img/fisch.jpg" />

                            </div>
                        </div>


                    </li>
                </ul>
            </div>
        </div>
        <script src="js/jquery-2.0.0.js"></script>
        <script src="js/jquery.masonry.min.js"></script>
        <script>
            $(function() {

                $('.columns_container').masonry({
                    itemSelector: '.menu_card',
                    columnWidth: 240
                });

            });
        </script>

    </body>
</html>

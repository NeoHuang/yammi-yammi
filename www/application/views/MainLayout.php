
<?php echo $content; ?>
<html>
    <body>
        <div class="wrapper content">
            <div class="menu">
                <ul>
                    <li class="menu_section">
                        <div class="section_title"><a>Vorspeise</a></div>
                        <div class="columns_container">
                            <div class="menu_card">
                                <img src= <?php echo YHtml::imgURL('springRoll.jpg') ?>  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Sed feugiat consectetur pellentesque. Nam ac elit risus,
                                    ac blandit dui. Duis rutrum porta tortor ut convallis.
                                    Duis rutrum porta tortor ut convallis.</p>
                            </div>
                            <div class="menu_card">
                                <img src= <?php echo YHtml::imgURL('tatar.jpg') ?> />
                            </div>
                            <div class="menu_card">

                                <img src= <?php echo YHtml::imgURL('salad.jpg') ?> />

                            </div>
                            <div class="menu_card">
                                <img src= <?php echo YHtml::imgURL('fisch.jpg') ?> />
                            </div>
                            <div class="menu_card">
                                <img src=<?php echo YHtml::imgURL('tomaten.jpg') ?>  />
                            </div>
                        </div>


                    </li>
                    <li class="menu_section">
                        <div class="section_title"><a>Hauptspeise</a></div>
                        <div class="columns_container">
                            <div class="menu_card">
                                <img src=<?php echo YHtml::imgURL('steak.jpg') ?> />

                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('spagetti.jpg') ?>  />

                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('gongpao.jpg') ?>  />

                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('fish2.jpg') ?>  />

                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('fish3.jpg') ?>  />

                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('lamb.jpg') ?> />
                                <p>preis: 10€</p>

                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('haishen.jpg') ?>  />

                            </div>
                        </div>


                    </li>
                    <li class="menu_section">
                        <div class="section_title"><a>Nachtisch</a></div>
                        <div class="columns_container">
                            <div class="menu_card">
                                <img src=<?php echo YHtml::imgURL('springRoll.jpg') ?>  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Sed feugiat consectetur pellentesque. Nam ac elit risus,
                                    ac blandit dui. Duis rutrum porta tortor ut convallis.
                                    Duis rutrum porta tortor ut convallis.</p>
                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('tatar.jpg') ?>  />

                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('salad.jpg') ?>  />

                            </div>
                            <div class = "menu_card">

                                <img src = <?php echo YHtml::imgURL('fisch.jpg') ?>  />

                            </div>
                            <div class="menu_card">

                                <img src=<?php echo YHtml::imgURL('fisch.jpg') ?>  />

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

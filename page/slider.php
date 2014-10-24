 <!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
           <?php
           $q_slider = mysql_query("select * from sliders order by slider_id");
		   while($r_slider = mysql_fetch_array($q_slider)){
		   ?>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="<?= $r_slider['slider_img'] ?>" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h4 class="title"><?= $r_slider['slider_name'] ?></h4>
                        <p class="description"><?= $r_slider['slider_description'] ?></p>
                    </div>
                </div>
            </div>
            <!--/slide -->
            <?php
		   }
			?>
            
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    <!--/slider -->
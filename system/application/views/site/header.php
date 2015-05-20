<?php
//
//echo "<pre>";
//print_r($menus);
//echo "</pre>";
?>

<header class="row">
    <div class="row">
        <div class="col-xs-12">
            <img class="img-responsive" src="<?php echo IMAGENS.'alt_artes.png'?>" alt="alt artes" width="268" height="156"  align="left">
            <div class="col-xs-12 texto" ><p>por fábio alt</p></div>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-12">

            <nav id="main_menu">
                <ul class="nav nav-justified">
                    <?php echo $menu ?>
                </ul>
            </nav>

        </div>
    </div>
</header>
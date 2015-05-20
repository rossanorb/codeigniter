<div class="row">
    <div class="col-xs-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php for($i=0; $i < count($carousel); $i++) :
                        if($i == 0) $class = 'class="active"'; else $class = NULL;
                 ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php echo $class; ?>></li>                
                <?php endfor; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div  role="listbox" class="carousel-inner">
            <?php foreach ($carousel as $foto):
               if(!isset($item)){ $item = 'item active'; }else{ $item = 'item';}
            ?>                
                <div class="<?php echo $item; ?>">
                    <img  src="<?php echo '/'.FOTOS.$foto->src; ?>" alt="Chania" width="966" height="648" align="center">
                </div>
            <?php endforeach;?>
            </div>    

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>                    
    </div>
</div>


<div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <section class="login-form">            
            <?php echo form_open('login',array('role'=>'login')) ?>    
                <a href="<?php echo base_url();?>"><img src="<?php echo IMAGENS.'alt_artes_200_80.png' ?>" class="img-responsive" alt="" /></a>
                <input type="email" name="email" placeholder="email" required class="form-control input-lg" value="<?php echo set_value('email'); ?>" />
                <input type="password"  name="password" class="form-control input-lg" id="password" placeholder="senha" required="" />
                <div class="pwstrength_viewport_progress">
                    <?php
                    if(isset($error)){
                       echo "<p>".$error."</p>";
                    }
                    echo form_error('email');
                    ?>                    
                </div>
                <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">login</button>
                <div>
                    <a href="#">recuperar senha</a>
                </div>
            </form>
        </section>  
    </div>
    <div class="col-md-4"></div>
</div>
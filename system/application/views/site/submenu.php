<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $menu; ?></a>
    <ul class="dropdown-menu" role="menu">
        <?php foreach ($submenus as $submenu): ?>
            <li><a href="<?php echo $submenu->id_menu; ?>"><?php echo $submenu->nome; ?></a></li>
        <?php endforeach;?>
    </ul>
</li>
<!-- <form  method="post" action="<?php bloginfo('url');?>/start/"> -->
<!-- <form method="post" action="http://localhost/naturesbestsweden/sv/listing-search-results/"> -->
<form method="post" action="">
    <div class="col-xs-12 col-md-2 form_cell">
        <?php echo getLocation(); ?>
    </div>
    <div class="location_map">

    </div>

    <div class="col-xs-12 col-md-2 form_btn" id="btnCat">
        <div class="select_arrow"></div>
        <label id="cat">CATEGORY</label>
    </div>

    <div class="col-xs-12 col-md-2 form_cell">
        <?php echo getHabitat(); ?>
    </div>

    <?php echo getCategories(); ?>
    <?php //echo getSeason(); ?>
    
    <input type="submit"/>
    
</form>
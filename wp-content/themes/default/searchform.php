<form class="row search-top-form text-right" method="get" action="<?= home_url(); ?>">
    <div class="col-md-4 no-padding">
        <ul class="search-cat-sl list-unstyled">
            <a href="#" class="current-cat dropdown-toggle" data-toggle="dropdown" data-value="0">Tất cả danh mục</a>
            <a href="#" class="drop dropdown-toggle" data-toggle="dropdown"><span class="fa fa-angle-down"></span></a>
            <ul class="list-items dropdown-menu">
                <li><a href="#" data-value="0">Tất cả danh mục</a></li>
                <li><a href="#" data-value="1">Ba kích</a></li>
                <li><a href="#" data-value="2">Nếp cái Hoa Vàng</a></li>
                <li><a href="#" data-value="3">Xuần Tình</a></li>
            </ul>
        </ul>
    </div>
    <div class="col-md-5 no-padding">
        <input class="search-text" name="s" required="" placeholder="Tìm kiếm ... " />
    </div>
    <div class="col-md-3 no-padding">
        <input type="hidden" name="post_type" value="product" />
        <input type="hidden" class="search-cat-id" name="product_cat_sl" value="" />
        <!--<div class="box-select">-->
        <input class="search-submit" type="submit" value="TÌM KIẾM" />
    </div>
</form>

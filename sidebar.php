<div class="sidebar">
    <div class="sidebar-category">
        <h3 class="sidebar-category__title">
            カテゴリー
        </h3>
        <div class="sidebar-category__line"></div>
        <nav class="sidebar-category__nav">
            <ul class="sidebar-category__nav-items">
                <?php
                $categories = get_categories();
                foreach( $categories as $category ){
                    if( $category->name != "Uncategorized" )
                        echo '<li><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="sidebar-category">
        <h3 class="sidebar-category__title">
            月別アーカイブ
        </h3>
        <div class="sidebar-category__line"></div>
        <nav class="sidebar-category__nav">
            <ul class="sidebar-category__nav-items">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'type' => 'monthly'
                );
                wp_get_archives($args);
                ?>
            </ul>
        </nav>
    </div>
</div>
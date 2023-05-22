<ul>

    <?php $terms = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => 1,
        'parent' => 0
    ]); ?>

    <?php foreach ($terms as $term) {

        $child = get_terms([
            'taxonomy' => 'product_cat',
            'hide_empty' => 1,
            'parent' => $term->term_id
        ]);

        if (15 == $term->term_id)
            continue;

        $icon = get_field('icon', 'term_' . $term->term_id);
        $icon_url = $icon['url'];
        if (!$icon)
            $icon_url = get_template_directory_uri(). '/img/icon-6-1.svg';
        ?>

        <li>
            <a href="<?= get_term_link($term->term_id) ?>"><img width="20" src="<?= $icon_url ?>" alt=""><span><?= $term->name ?></span></a>

            <?php if ($child) { ?>

                <div class="sub-menu sub-menu-2x">
                    <div class="prev">
                        <a href="<?= get_term_link($term->term_id) ?>"><i class="fas fa-chevron-left"></i>Назад</a>
                    </div>
                    <h3 class="title"><?= $term->name ?> <img width="20" src="<?= $icon_url ?>" alt=""></h3>
                    <ul>
                        <?php foreach ($child as $child_term) { ?>
                            <li><a href="<?= get_term_link($child_term->term_id) ?>"><?= $child_term->name ?> (<?= $child_term->count ?>)</a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

        </li>

    <?php } ?>

</ul>

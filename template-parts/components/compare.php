<?php
$compare = $args['compare'] ?? [];
$columns = $compare['columns'] ?? [];
$rows = $compare['rows'] ?? [];
?>

<section class="section" id="compare">
    <div class="container">
        <div class="section__head">
            <h2 class="section__title"><?php echo esc_html($compare['title'] ?? ''); ?></h2>
            <p class="section__lead"><?php echo esc_html($compare['lead'] ?? ''); ?></p>
        </div>
        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="table__th">Можливість</th>
                        <?php foreach ($columns as $column): ?>
                            <th class="table__th"><?php echo esc_html($column); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td class="table__td table__name"><?php echo esc_html($row['name'] ?? ''); ?></td>
                            <?php foreach ($row['values'] as $value): ?>
                                <td class="table__td table__<?php echo $value ? 'yes' : 'no'; ?>"><?php echo $value ? '✓' : '—'; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

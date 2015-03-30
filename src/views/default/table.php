<form action="<?php echo $table->getFormAction() ?>" method="post">
    <div class="table-header">
        <h3><?php echo $table->getTitle(); ?></h3>
        <?php if ($table->hasActions('table')): ?>
            <?php foreach($table->getActions('table') as $action): ?>
                <?php echo $action->render() ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <table>
        <thead>
            <tr>
                <?php foreach ($table->getColumns() as $column): ?>
                    <th <?php foreach ($column->getAttributes() as $attr => $val): ?>
                         <?php echo $attr; ?>="<?php echo $val; ?>"
                    <?php endforeach; ?>>

                        <?php if ($column->isSortable() && $column->getHref()): ?>
                            <a href="<?php echo $column->getHref(); ?>">
                                <?php echo $column->getLabel(); ?>
                            </a>
                        <?php else: ?>
                            <?php echo $column->getLabel(); ?>
                        <?php endif; ?>

                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>

        <tbody>
            <?php if($table->hasRows()): ?>
                <?php foreach ($table->getRows() as $row): ?>
                    <tr data-id="<?php echo $row->id; ?>">
                        <?php foreach ($row->cells as $cell): ?>
                            <td><?php echo $cell->value; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?echo count($table->getColumns()) ?>">No Results Found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</form>

<div class="table-footer">
    <?php if ($table->hasLinks()): ?>
        <?php echo $table->getLinks() ?>
    <?php endif; ?>
</div>
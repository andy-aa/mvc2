<?php
/**
 *
 * @var string $title
 * @var int $pageCount
 * @var int $currentPage
 * @var string $paginationURL
 *
 * @var array $tableHeaders
 * @var array $table
 *
 * @var string $primaryKey
 *
 * @var string $delRowURL
 * @var string $showEditFormURL
 *
 * @var string $showAddFormURL
 *
 */
?>

<h1><?= ($title) ?></h1>

<?= $pagination = HTML::pagination($pageCount, $currentPage, $paginationURL) ?>

<table class="table">
    <tr>
        <?php
        foreach ($tableHeaders as $name => $comment) {
            echo "<th>" . (empty($comment) ? $name : $comment) . "</th>";
        }
        ?>
        <th></th>
    </tr>
    <?php
    foreach ($table as $row) { ?>
        <tr><?php
            foreach ($row as $cell) {
                echo "<td>$cell</td>";
            }
            ?>
            <td>
                <a href="<?= $delRowURL . $row[$primaryKey] ?>" class="delLink" title="delete">×</a>
                <a href="<?= $showEditFormURL . $row[$primaryKey] ?>" class="editLink" title="edit">edit</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<?= $pagination ?>
<br>
<a href="<?= $showAddFormURL ?>">ADD</a>
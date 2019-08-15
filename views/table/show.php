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
 * @var string $className
 *
 */
?>

<h1><?= ($title) ?></h1>

<?= $pagination = HTML::pagination($pageCount, $currentPage, "$className/ShowTable") ?>

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
                <a href="<?= HTML::url("$className/DelRow", ['id' => $row[$primaryKey]]) ?>" class="delLink"
                   title="delete">×</a>
                <a href="<?= HTML::url("$className/ShowEditForm", ['id' => $row[$primaryKey]]) ?>" class="editLink"
                   title="edit">edit</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<?= $pagination ?>
<br>
<a href="<?= HTML::url("$className/ShowAddForm") ?>">ADD</a>
<?php

use App\View\Helper\HTML;

/**
 * @var string $title
 * @var string $targetURL
 * @var array $fields
 */
?>
<h1><?= ($title) ?></h1>

<form action="<?= $targetURL ?>" class="editTable" method="post">
    <?php foreach ($fields as $name => $row) {
        echo '<label for="' . $name . '">' . (empty($row['Comment']) ? $name : $row['Comment']) . '</label>';
        echo HTML::formField(
            $name,
            $data[$name] ?? null,
            $row['Type'],
            $row['Comment']
        );
    }
    ?>
    <input type="submit" value="ok">
</form>
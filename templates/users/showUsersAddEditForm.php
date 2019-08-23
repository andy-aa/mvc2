<?php

use View\Helper\HTML;

/**
 * @var string $title
 * @var string $targetURL
 * @var array $fields
 * @var array $user_group
 */

?>
<h1><?= ($title) ?></h1>

<form action="<?= $targetURL ?>" class="editTable" method="post">
    <?php foreach ($fields as $name => $row) {
        echo '<label for="' . $name . '">' . (empty($row['Comment']) ? $name : $row['Comment']) . '</label>';
        if ($name != 'user_group_id') {
            echo HTML::formField(
                $name,
                $data[$name] ?? null,
                $row['Type'],
                $row['Comment']
            );
        } else {
            echo HTML::formSelect(
                $user_group,
                $name,
                $data[$name] ?? null
            );
        }
    }
    ?>
    <input type="submit" value="ok">
</form> 
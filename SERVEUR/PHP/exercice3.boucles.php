<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice3.boucles</title>
</head>
<body>
<table class="highlight centered responsive-table">
    <thead>
        <tr>
            <th></th>
            <?php
            $x = 0;
            while ($x <= 12) {
            ?>
                <th><?= $x ?></th>
            <?php
                $x++;
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $y = 0;
        while ($y <= 12) {
        ?>
            <tr>
                <td>
                    <?= $y ?>
                </td>
                <?php
                $x = 0;
                while ($x <= 12) {
                ?>
                    <td>
                        <?= $x * $y ?>
                        <?php $x++; ?>
                    </td>
                <?php
                } 
                ?>
            </tr>
        <?php
        $y++;
        }
        ?>
    </tbody>
</table>
</body>
</html>
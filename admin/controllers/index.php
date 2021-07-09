<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Home</h1>
    <table width="100%" border=1>
        <tr>
            <td valign="top">
                <?php include "add.php" ?>

            </td>
            <td rowspan="2" valign="top">
                <?php include "view.php" ?>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <?php include "update.php" ?>
            </td>
        </tr>
    </table>
</body>

</html>
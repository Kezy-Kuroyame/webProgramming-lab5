<?php
require_once('../lab5/utils/mySQL.php');

$sql = new MySQL();

if (isset($_POST['list'])) {
    $id = $_GET['id'];
    $adress = "http://localhost/lab5/list.php";
    header("Location: $adress");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lab5/assets/css/delete.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
    <title>Social-site</title>
</head>
<body>
    <div class="content">
        <div class="block">
            <div class="header">
                Удаление страницы
            </div>
            <div class="line"></div>
            <div class="main">
                <form method="POST">
                    <?php
                    if (isset($_POST['delete'])){
                        
                        $id = $_GET['id'];

                        $sql->deleteRow($id);
                        echo ("<div class='question success'>Страница успешно удалена!</div>");           
                            
                    }
                    
                    elseif (isset($_POST['back'])){
                        $id = $_GET['id'];
                        $adress = "http://localhost/lab5/index.php?id=$id";
                        header("Location: $adress");
                    }
                    else{
                        echo ("<div class='question'>Вы уверены, что хотите удалить страницу?</div>");
                    }
                    ?>
                    <div class="btn">
                        <?php
                        if (isset($_POST['delete'])) {
                            echo('<input type="submit" value="Войти" name="list">');
                        } else {
                            echo ('<input type="submit" value="Удалить" name="delete">');
                            echo ('<input type="submit" value="Вернуться" name="back">');
                        }
                        ?>

                
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
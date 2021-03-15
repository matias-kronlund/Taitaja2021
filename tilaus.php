<?php
    session_start();
    $link = mysqli_connect("localhost", "Y2021278_user", "Iezie0Doohoh", "Y2021278_DB");
    if (!$link) {
        echo "error";
    }
    $name = $_POST['nimi'];
    $post = $_POST['post'];
    $email = $_POST['email'];
    $tel = password_hash($_POST['tel'], PASSWORD_ARGON2I);

    $sql = "INSERT INTO orders (Nimi, Postiosoite, Sahkopostiosoite, Puhelin)
    VALUES ('$name', '$post', '$email', '$tel')";
    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tilaus</title>
    <link rel="stylesheet" href="src/style/tilaus/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script>
        let prods = [
        <?php
            foreach ($_SESSION["products"] as $value) {
                echo "{";
                    echo 'name:"'.$value[0].'",';
                    echo 'price:"'.$value[1].'",';
                    echo 'amount:"'.$value[2].'",';
                echo "},";
            }
        ?>
        ]
        let persdata = {
            <?php
                echo "nimi:'".$_POST['nimi']."',";
                echo "tel:'".$_POST['tel']."',";
                echo "email:'".$_POST['email']."',";
                echo "post:'".$_POST['post']."'";
            ?>
        }
    </script>
</head>
<body>
    <div id="content">
        <div id="center-box">
            <div id="tablecon">
            </div>
            <div id="pers">
                <div>
                    <label for="name">Nimi</label>
                    <p id="name">Matias</p>
                </div>
                <div>
                    <label for="address">Postiosoite</label>
                    <p id="address">kasffaf 20a </p>
                </div>
                <div>
                    <label for="email">Sähköpostiosoite</label>
                    <p id="email">Matias.asdaf@asda.com</p>
                </div>
                <div>
                    <label for="phone">Puhelinnumero</label>
                    <p id="phone">412 48273 4233</p>
                </div>
                <div>
                    <label for="deli">Delivary:</label>
                    <p id="deli">Matkahuolto</p>
                </div>
                <div>
                    <label for="total">Yhteensä:</label>
                    <p id="total">50$</p>
                </div>
                
                
            </div>
        </div>
    </div>
    <script src="src/scripts/tiers.js"></script>
    <script src="src/scripts/confirme.js"></script>
</body>
</html>
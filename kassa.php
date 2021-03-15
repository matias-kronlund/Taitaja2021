<?php
$link = mysqli_connect("localhost", "Y2021278_user", "Iezie0Doohoh", "Y2021278_DB");
if (!$link) {
    echo "error";
}
$sql = "SELECT * FROM `renkaat`";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kassa</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/style/kassa/main.css">
    <script type="text/javascript" 
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script>
    let tiers = [
        <?php
        $query = mysqli_query($link,"SELECT * FROM `renkaat`");
        while ($car = mysqli_fetch_assoc($query)) {
            echo "{";
                echo "Merkki: " . '"' . $car["Merkki"] . '"' .  ",";
                echo "Malli: " . '"' . $car["Malli"] . '"' . ",";
                echo "Tyyppi: " . '"' . $car["Tyyppi"] . '"' . ",";
                echo "Koko: " . '"' . $car["Koko"] . '"' . ",";
                echo "Hinta: " . '"' . $car["Hinta"] . '"' .  ",";
                echo "Saldo: " . '"' . $car["Saldo"]. '"' ;
                echo "},";
        }
    ?>
    ];
</script>
</head>
<body>
    <header>

    </header>
    <div id="content">
        <div id="center-box">
            <div id="tablecon">
                <div class="table">
                    <div>Rengasmerkki</div>
                    <div>Rengaskoko</div>
                    <div>Tilattu määrä</div>
                    <div>Hinta</div>
                </div>
            </div>
            <div class="shipping">
                <button class="shipb">Nouto liikkeestä</button>
                <button class="shipb">Matkahuolto</button>
            </div>
            <div class="frm">
                <form action="/tilaus.php" method="POST">
                    <input type="text" placeholder="Nimi" name="nimi" required>
                    <input type="text" placeholder="Postiosoite" name="post" required>
                    <input type="tel" placeholder="Puhelinnumero" name="tel" required>
                    <input type="email" placeholder="Sähköpostiosoite" name="email" required>
                    <button type="submit">Tilaa</button>
                </form>
            </div>
        </div>
    </div>
    <footer>

    </footer>
    <script src="src/scripts/cart.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
			$.ajax('/saveData.php', {
				type: 'POST',  // http method
				data: { transd: transdata },  // data to submit
				success: function (data, status, xhr) {
				},
				error: function (jqXhr, textStatus, errorMessage) {
					}
			});
    });
    </script>
</body>
</html>


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
    <title>Mustat Renkaat</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/style/style.css">
    <link rel="stylesheet" href="src/style/home/main.css">
    <link rel="stylesheet" href="src/style/header.css">
    <link rel="stylesheet" href="src/style/home/mobile.css">
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
        <nav>
            <img src="src/images/logos/logo_dark.png" alt="">
            <ul>
                <li class="current_page"><a href="index.php"><h2>Etusivu</h2></a></li>
                <li><a href="apua.html"><h2>Renkaiden vaihto</h2></a></li>  
                <li><a href="yhteystiedot.html"><h2>Yhteystiedot</h2></a></li>
            </ul>
        </nav>
    </header>
    <div id="banner">
        <div>
            <img id="adds" src="src/images/Kumho-Talvisomepohja19-IG1080x1080-FIN-2.png" alt="">
        </div>
    </div>
    <div id="content">
        <div id="sorters">
            <button class="current filterbutton" onclick="cahngesorter(sortNameA, 0)">A-Ö</button>
            <button class="filterbutton" onclick="cahngesorter(sortNameB, 1)">Ö-A</button>
            <button class="filterbutton" onclick="cahngesorter(sortHintaa, 2)">Halvimmat ensin</button>
            <button class="filterbutton" onclick="cahngesorter(sortHintab, 3)">Kalleimmat ensin</button>
            <button class="filterbutton" onclick="gotoCart()" style="background: red; color: black">Kassalle</button>
        </div>
        <div class="app">
            <div class="props" id="props">
            </div>
            <div class="products" id="products">
            </div>
        </div>
    </div>
    <footer>
        <div class="cols">
            <ul>
                <li><h1>Yhteystiedot</h1></li>
                <li><h2>040-7128158</h2></li>
                <li><h2>myyntimies@mustatrenkaat.net</h2></li>
            </ul>
            <ul>
                <li><h1>Sijainti</h1></li>
                <li><h2>Kosteenkatu 1</h2></li>
                <li><h2>86300 Oulainen</h2></li>
            </ul>
        </div>
    </footer>
    <script src="src/scripts/shop.js"></script>
    <script src="src/scripts/app.js"></script>
    <script src="src/scripts/add.js"></script>
</body>
</html>
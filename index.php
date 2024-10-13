<?php
class Prodotto
{
    public $id;
    public $nome;
    public $prezzo;
    public $descrizione;
    public $categoria;
    public $tipoProdotto;

    public function __construct($id, $nome, $prezzo, $descrizione, Categoria $categoria, TipoProdotto $tipoProdotto)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->prezzo = $prezzo;
        $this->descrizione = $descrizione;
        $this->categoria = $categoria;
        $this->tipoProdotto = $tipoProdotto;
    }

    public function getCard()
    {
        return "Prodotto: $this->nome, Prezzo: $this->prezzo, Categoria: " . $this->categoria->nome . ", Tipo: " . $this->tipoProdotto->nome;
    }
}

class Categoria
{
    public $id;
    public $nome;

    public function __construct($id, $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }
}

class TipoProdotto
{
    public $id;
    public $nome;

    public function __construct($id, $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }
}

// Creazione tipo di prodotti
$cibo = new TipoProdotto(1, "Cibo");
$gioco = new TipoProdotto(2, "Gioco");
$cuccia = new TipoProdotto(3, "Cuccia");

// Creazione categorie
$cani = new Categoria(1, "Cani");
$gatti = new Categoria(2, "Gatti");

// Creazione dei prodotti
$prodotto1 = new Prodotto(1, "Cibo per cani", 11.99, "Cibo per cani", $cani, $cibo);
$prodotto2 = new Prodotto(2, "gioco per cani", 29.99, "Set di giochi per cane", $cani, $gioco, );
$prodotto3 = new Prodotto(3, "Cuccia per cani", 33.99, "Cuccia confortevole per cani", $cani, $cuccia, );
$prodotto4 = new Prodotto(4, "Cibo per gatti", 11.99, "Cibo per gatti", $gatti, $cibo);
$prodotto5 = new Prodotto(5, "Tiragraffi", 29.99, "Set di giochi per cane", $gatti, $gioco, );
$prodotto6 = new Prodotto(6, "Cuccia per gatti", 33.99, "Cuscino per gatti", $gatti, $cuccia, );



function printProduct(Prodotto $prodotto)
{
    ?>
    <div class="card">

        <img src="<?php
        if ($prodotto->categoria->nome == 'Cani') {

            if ($prodotto->tipoProdotto->nome == 'Cibo') {
                echo 'img/special-dog-excellence-cibo-secco-per-cani-al-gusto-pollo';
            } elseif ($prodotto->tipoProdotto->nome == 'Gioco') {
                echo 'img/set-da-6-giochi-per-cani-da-mordere.webp';
            } elseif ($prodotto->tipoProdotto->nome == 'Cuccia') {
                echo 'img/icon_topseller_1_85__0.jpg';
            }
        } elseif ($prodotto->categoria->nome == 'Gatti') {
            // Immagini per i prodotti per gatti
            if ($prodotto->tipoProdotto->nome == 'Cibo') {
                echo 'img/whiskas-croccantini-per-gatti-adulti-con-tonno';
            } elseif ($prodotto->tipoProdotto->nome == 'Gioco') {
                echo 'img/0602561144836_0_0_536_0_75.jpg';
            } elseif ($prodotto->tipoProdotto->nome == 'Cuccia') {
                echo 'img/Cuccia_per_gatto_Glam_Ciambella.webp';
            }
        }
        ?>" alt="<?php echo $prodotto->nome; ?>" class="card-img">

        <div class="card-body">
            <h2><?php echo $prodotto->nome; ?></h2>
            <p><?php echo $prodotto->descrizione; ?></p>
            <span class="prezzo">€<?php echo $prodotto->prezzo; ?></span>
            <span class="tipo-prodotto"><?php echo $prodotto->tipoProdotto->nome; ?></span>
        </div>
    </div>
    <?php
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Shop Online Prodotti per Animali</title>
</head>

<body>
    <div class="container">
        <?php
        printProduct($prodotto1);
        printProduct($prodotto2);
        printProduct($prodotto3);
        printProduct($prodotto4);
        printProduct($prodotto5);
        printProduct($prodotto6);
        ?>
    </div>

</body>

</html>
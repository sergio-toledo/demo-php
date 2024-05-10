<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

//una alternativa seria utilizar file_get_contents
// $result = file_get_contents(API_URL); //si solo se quiere hacer un GET de una API

$data = json_decode($result, true);
curl_close($ch);
?>

<head>
    <meta charset="UTF-8"/>
    <title>La próxima pelicula de Marvel</title>
    <meta name="description" content="La próxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link 
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <!--<pre style="font-size: 10px; overflow: scroll; height: 250px;">
        <?php //var_dump($data); ?>
    </pre>-->
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 16px;"
        />
    </section>
    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }
    body {
        display: grid;
        place-content: center;
    }
    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img {
        margin: 0 auto;
    }
</style>
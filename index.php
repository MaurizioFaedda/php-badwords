<?php
// scrivo le mie variabili
    $paragraph = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

    // rendo tutte le parole in minuscolo in modo da poter nascondere anche parola con la lettera maiuscola
    $lower_paragraph = strtolower($paragraph);


    // badword
    $my_badword = $_GET['badword'];
    // leggo la badword in minuscolo a presceindere da quello che l'utente scrive
    $final_badword = strtolower($my_badword);

    // con cosa voglio rimpiazzare
    $replace = "***";

    // risultato finale: nuovo paragrafo con censura
    // Tutti i caratteri dopo il punto tornano maiuscoli
    $new_paragraph = str_replace($final_badword, $replace, $lower_paragraph);
    preg_match_all("/\.\s*\w/", $new_paragraph, $matches);
    foreach($matches[0] as $match){
    $new_paragraph = str_replace($match, strtoupper($match), $new_paragraph);
    }
    // La prima lettera torna maiuscola
    $final_paragraph = ucfirst($new_paragraph);

    // lunghezza del paragrafo originale
    $strlen_paragraph = strlen($paragraph);

    // lunghezza del nuovo paragrafo
    $strlen_new_paragraph = strlen($new_paragraph);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <small>Per censurare una parola all'interno del paragrafo dai un valore nella querystring a <b>badword</b></small>
        <h1>Stampa con <em>echo</em></h1>
        <h2>Censured paragraph</h2>

        <!-- stampo il paragrafo censurato -->
        <p> <?php echo $final_paragraph ?></p>

        <h3>Original paragraph length vs New paragraph length</h3>
        <p> Il paragrafo senza censure contiene
            <b><?php echo $strlen_paragraph ?></b>
            caratteri.
            <br>
            Il paragrafo censurato contiene
            <b><?php echo $strlen_new_paragraph ?></b>
            caratteri.
        </p>

        <hr>

        <h1>Stampa con <em>var_dump</em></h1>
        <h2>Censured paragraph</h2>

        <!-- stampo il paragrafo censurato -->
        <p> <?php var_dump($final_paragraph) ?></p>

        <h3>Original paragraph length vs New paragraph length</h3>
        <p> Il paragrafo senza censure contiene
            <b><?php var_dump($strlen_paragraph) ?></b>
            caratteri.
            <br>
            Il paragrafo censurato contiene
            <b><?php var_dump($strlen_new_paragraph) ?></b>
            caratteri.
        </p>



    </body>
</html>

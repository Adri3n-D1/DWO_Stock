<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style_base.css">
    <link type="text/css" rel="stylesheet" href="prism.css">
    <title>Memo</title>
</head>
<body>
    <div class="page-content section-content">
        <header>
            <nav class="">
                <a href="#">ACCUEIL</a>
            </nav>
        </header>
        <main class="">
            <h2>Les différences entre Javascript et PHP</h2>
            <h3>La structure if</h3>

            <h4>Présentation</h4>

            <p>a - Une structure if classique</p>
            <div class="code-row">
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
let x = 'fruit';
let check = false;

if (x == 'pomme') {
    check = true;
}
else if (x == 'banane') {
    check = true;
}
else {
    check = false;
}</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-php line-numbers">//Code PHP
$x = 'fruit';
$check = false;

if ($x == 'pomme') {
    $check = true;
}
elseif ($x == 'banane') {
    $check = true;
}
else {
    $check = false;
}</code></pre>
                </div>
            </div>
            <p>Mise à part le <span class="text-keyword">else if</span> du Javascript face au <span class="text-keyword">elseif</span> du PHP, les structures <span class="text-keyword">if</span> des deux langages sont similaire.</p>
            <p>b - Différence de conception</p>
            <div class="code-row">
                <div class="code-col">
                <pre><code class="language-js line-numbers">// code Javascript
if (true) {
    let myVar = 15;
}
myVar += 15; // Erreur

// En Javascript le if est considéré comme un scope à
// part entière, myVar n'existe donc pas en dehors du if.</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-php line-numbers">//Code PHP
if (true) {
    $myVar = 15;
}
$myVar += 15; // Pas d'erreur

// En PHP le if ne définit pas un nouveau scope,
// myVar existe donc en dehors du if.</code></pre>
                </div>
            </div>
            <p>En revanche la conception du scope d'une structure <span class="text-keyword">if</span> est différente entre le Javascript et le PHP.</p>
            <p>Le Javascript considère que le <span class="text-keyword">if</span> définit un nouveau scope et donc que la portée d'une variable locale déclarée dans un <span class="text-keyword">if</span> sera définit par celui-ci.</p>
            <p>Le PHP considère en revanche qu'une structure <span class="text-keyword">if</span> ne définit pas de nouveau scope et donc que la portée d'une variable locale déclarée dans un <span class="text-keyword">if</span> dépendra dépendra du scope ou est contenu le <span class="text-keyword">if</span> lui même.</p>            
        </main>
    </div>
    <script src="prism.js"></script>
</body>
</html>
<?php
for ($i = 0; $i < 10; $i++) {
    $x = $i;
}
echo $x . '<br>';
echo $i . '<br>';
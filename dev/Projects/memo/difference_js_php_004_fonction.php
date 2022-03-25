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
            <h3>La structure switch</h3>

            <h4>Présentation</h4>

            <p>a - Exemple de fonction classique</p>
            <div class="code-row">
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
function myFunction(myVar) {
    return myVar + 1;
}
let result = myFunction(10);</code></pre>
            </div>
            <div class="code-col">
                <pre><code class="language-php line-numbers">//Code PHP
function myFunction($myVar) {
    return $myVar + 1;
}
$result = $myFunction(10);</code></pre>
                </div>
            </div>
            <p>Ces structures dans les deux langages sont identiques</p>
            <p>b - Exemple de fonction anonymes</p>
            <div class="code-row">
                <div class="code-col">
                <pre><code class="language-js line-numbers">// code Javascript
let myVarFunction = function(myVar) {
    return myVar + 1;
};
let result = myVarFunction(10);</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-php line-numbers">//Code PHP
$myVarFunction = function($myVar) {
    return $myVar + 1;
};
$result = $myVarFunction(10);</code></pre>
                </div>
            </div>
            <p>Ces structures dans les deux langages sont identiques</p>
            <p>C - Fonction flechée en Javascript</p>
            <div class="code-row">
                <div class="code-col">
                <pre><code class="language-js line-numbers">// Code Javascript
let myVarFunction = (myVar) => {
    return myVar + 1;
};

let result = myVarFunction(10);</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-php line-numbers">//Code Javascript
let myVarFunction = (myVar) => myVar + 1;
let result = myVarFunction(10);

// Quand une fonction fléchée est écrite de la sorte,
// Le return est implicite</code></pre>
                </div>
            </div>
            <p>Voici les deux types de fonctions fléchée en Javascript, ce type de fonctions n'existe pas en PHP.</p>  
        </main>
    </div>
    <script src="prism.js"></script>
</body>
</html>
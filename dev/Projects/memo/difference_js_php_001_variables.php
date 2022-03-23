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
            <h3>Les Variables</h3>

            <h4>Présentation</h4>

            <p>a - Déclare une variable sans l'initialiser</p>
            <div class="code-row">
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
let myVar;</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-php line-numbers">//Code PHP
$myVar;</code></pre>
                </div>
            </div>
            <p>b - Déclarer puis affecter une valeur à une variable</p>
            <div class="code-row">
                <div class="code-col">
                <pre><code class="language-js line-numbers">// code Javascript
let myVar;
myVar = 15;</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-php line-numbers">//Code PHP
$myVar;
$myVar = 15;</code></pre>
                </div>
            </div>
            <p>c - La même chose de manière raccourci</p>
            <div class="code-row">
                <div class="code-col">
                <pre><code class="language-js line-numbers">// code Javascript
let myVar = 15;</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-php line-numbers">//Code PHP
$myVar = 15;</code></pre>
                </div>
            </div>
            <p>Une des grandes différences ici est le mot clé <span class="text-keyword">let</span> pour la déclaration d'une variable en javascript. Ce mot clé ne doit être utilisé que lors de la déclaration de cette variable, ensuite on ne l'utilise plus.</p>
            <p>En php, rien de tout ça, on précéde en revanche le nom d'une variable par le symbole du dollard <span class="text-keyword">$</span> en toute situation : déclaration, initialisation et utilisation.</p>
            
            <h4>Les differents genres de variable</h4>
            <p>a - Portée locale</p>
            <div class="code-row">
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
let myVarLocal = 15;
myVarLocal += 15;</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code PHP
$myVarLocal = 15;
myVarLocal += 15;</code></pre>
                </div>
            </div>
            <p>c - Portée globale</p>
            <div class="code-row">
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
myVarGlobal = 15;
myVarGlobal += 15;</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code PHP
global $myVarGlobal = 15;
myVarGlobal += 15;</code></pre>
                </div>
            </div>
            <p>c - Test de portée</p>
            <div class="code-row">
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
function myFunction() {
    myVarGlobal = 15;
    let myVarLocal = 15;
}
myFunction();

myVarGlobal += 15;
myVarLocal += 15; // Erreur

// myVarGlobal existe même en dehors de myFunction()
// myVarLocal n'existe que dans myFunction()</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code PHP
function myFunction() {
    global $myVarGlobal = 15;
    $myVarLocal = 15;
}
myFunction();

$myVarGlobal += 15;
$myVarLocal += 15; // Erreur

// myVarGlobal existe même en dehors de myFunction()
// myVarLocal n'existe que dans myFunction()</code></pre>
                </div>
            </div>
            <p>d - Le var de Javascript</p>
            <div class="code-row">
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
myVar += 15;
var myVar = 15;

// Ce code fonctionne :(</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
myVar += 15;
let myVar = 15;

// Ce code ne fonctionne pas !</code></pre>
                </div>
            </div>
            <p>En Javascript, le mot clé <span class="text-keyword">var</span> permet de créer une variable de portée locale. Il permet aussi de la déclarer dans le code, après son utilisation. Ce n'est cependant pas recommandé de le faire, car peu lisible. Aujourd'hui, ce mot clé est déconseillé et il convient d'utiliser <span class="text-keyword">let</span> à la place.</p>
                <p>Il n'existe pas d'équivalent en PHP.</p>
        </main>
    </div>
    <script src="prism.js"></script>
</body>
</html>
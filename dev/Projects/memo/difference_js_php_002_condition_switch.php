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

            <p>a - Une structure switch classique</p>
            <div class="code-row">
                <div class="code-col">
                    <pre><code class="language-js line-numbers">// code Javascript
let userChoice = 'pomme';
let validChoice;

switch (userChoice) {
    case 'café':
        validChoice = false;
        break;
    case 'banane':
    case 'pomme':
    case 'fraise':
        validChoice = true;
        break;
    default:
        validChoice = false;
}</code></pre>
            </div>
            <div class="code-col">
                <pre><code class="language-php line-numbers">//Code PHP
$userChoice = 'pomme';
$validChoice;

switch ($userChoice) {
    case 'café':
        $validChoice = false;
        break;
    case 'banane':
    case 'pomme':
    case 'fraise':
        $validChoice = true;
        break;
    default:
        $validChoice = false;
}</code></pre>
                </div>
            </div>
            <p>Les structures des deux langages sont identiques</p>
            <p>b - Différence de conception</p>
            <div class="code-row">
                <div class="code-col">
                <pre><code class="language-js line-numbers">// code Javascript
let userChoice = 'pomme';
let validChoice;

let userChoice = 0;
let validChoice;

switch (userChoice) {
    case 0:
        validChoice = false;
        let myVar = 15;
        break;
    case 1:
        validChoice = true;
        break;
    default:
        validChoice = false;
}

myVar += 15; // Erreur

// En Javascript le switch est considéré comme un scope à
// part entière, myVar n'existe donc pas en dehors du switch.</code></pre>
                </div>
                <div class="code-col">
                    <pre><code class="language-php line-numbers">//Code PHP
$userChoice = 'pomme';
$validChoice;

$userChoice = 0;
$validChoice;

switch ($userChoice) {
    case 0:
        $validChoice = false;
        $myVar = 15;
        break;
    case 1:
        $validChoice = true;
        break;
    default:
        $validChoice = false;
}

$myVar += 15; // Pas d'erreur

// En PHP le switch ne définit pas un nouveau scope,
// myVar existe donc en dehors du switch.</code></pre>
                </div>
            </div>
            <p>En revanche la conception du scope d'une structure <span class="text-keyword">switch</span> est différente entre le Javascript et le PHP.</p>
            <p>Le Javascript considère que le <span class="text-keyword">switch</span> définit un nouveau scope et donc que la portée d'une variable locale déclarée dans un <span class="text-keyword">switch</span> sera définit par celui-ci.</p>
            <p>Le PHP considère en revanche qu'une structure <span class="text-keyword">switch</span> ne définit pas de nouveau scope et donc que la portée d'une variable locale déclarée dans un <span class="text-keyword">switch</span> dépendra dépendra du scope ou est contenu le <span class="text-keyword">switch</span> lui même.</p>            
        </main>
    </div>
    <script src="prism.js"></script>
</body>
</html>
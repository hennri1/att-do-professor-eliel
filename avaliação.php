
<!DOCTYPE html>
<html>
<head>
    <title>Avaliação - Estruturas de Controle e Switch/Case em PHP</title>
</head>
<body>
    <h2>Avaliação - Estruturas de Controle e Switch/Case em PHP</h2>
    <form method="post">
        <label>Estruturas de Controle:</label>
        <select name="opcao1">
            <option value="">Selecione</option>
            <option value="2">Verificação de idade</option>
            <option value="4">Nome começa com A</option>
            <option value="5">Par ou ímpar</option>
            <option value="7">Dia da semana</option>
            <option value="9">Comparação de palavras</option>
        </select>
        <br><br>
        <label>Switch/Case:</label>
        <select name="opcao2">
            <option value="">Selecione</option>
            <option value="12">Notas escolares</option>
            <option value="13">Meses do ano</option>
            <option value="14">Operações matemáticas</option>
            <option value="18">Escolha de cor</option>
            <option value="20">Meses com quantidade de dias</option>
        </select>
        <br><br>
        <label>Outros:</label>
        <select name="opcao3">
            <option value="">Selecione</option>
            <option value="21">Contagem simples </option>
            <option value="22">Soma de números</option>
            <option value="23">Tabuada</option>
            <option value="24">Adivinhação</option>
            <option value="25">Validação de senha</option>
            <option value="26">Contagem regressiva</option>
        </select>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <br>
<?php
// Descobre qual select foi usado
$opcao = "";
if (!empty($_POST['opcao1'])) $opcao = $_POST['opcao1'];
if (!empty($_POST['opcao2'])) $opcao = $_POST['opcao2'];
if (!empty($_POST['opcao3'])) $opcao = $_POST['opcao3'];

if ($opcao !== "") {
    $opcao = intval($opcao);
    switch ($opcao) {
        // ----------- Estruturas de Controle (if/else) -----------
        case 2:
            echo '<b>Verificação de idade</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao1" value="2">
                    Digite sua idade: 
                    <input type="number" name="idade" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['idade'])) {
                $idade = intval($_POST['idade']);
                if ($idade < 12) {
                    echo "Criança<br>";
                } elseif ($idade <= 17) {
                    echo "Adolescente<br>";
                } else {
                    echo "Adulto<br>";
                }
            }
            break;
        case 4:
            echo '<b>Nome começa com A</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao1" value="4">
                    Digite um nome: 
                    <input type="text" name="nome" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['nome'])) {
                $nome = trim($_POST['nome']);
                if (strtolower(substr($nome, 0, 1)) === "a") {
                    echo "O nome começa com A.<br>";
                } else {
                    echo "O nome não começa com A.<br>";
                }
            }
            break;
        case 5:
            echo '<b>Par ou ímpar</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao1" value="5">
                    Digite um número: 
                    <input type="number" name="num" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['num'])) {
                $num = intval($_POST['num']);
                if ($num % 2 == 0) {
                    echo "O número é par.<br>";
                } else {
                    echo "O número é ímpar.<br>";
                }
            }
            break;
        case 7:
            echo '<b>Dia da semana</b><br>';
            $diaSemana = date("N"); 
            if ($diaSemana == 6 || $diaSemana == 7) {
                echo "Hoje é fim de semana.<br>";
            } else {
                echo "Hoje é dia útil.<br>";
            }
            break;
        case 9:
            echo '<b>Comparação de palavras</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao1" value="9">
                    Digite a primeira palavra: 
                    <input type="text" name="p1" required>
                    Digite a segunda palavra: 
                    <input type="text" name="p2" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['p1']) && isset($_POST['p2'])) {
                $p1 = trim($_POST['p1']);
                $p2 = trim($_POST['p2']);
                if ($p1 === $p2) {
                    echo "As palavras são iguais.<br>";
                } else {
                    if (strlen($p1) > strlen($p2)) {
                        echo "A primeira palavra é maior.<br>";
                    } elseif (strlen($p2) > strlen($p1)) {
                        echo "A segunda palavra é maior.<br>";
                    } else {
                        echo "As duas têm o mesmo tamanho.<br>";
                    }
                }
            }
            break;

        // ----------- Switch/Case em PHP -----------
        case 12:
            echo '<b>Notas escolares</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao2" value="12">
                    Digite uma letra de conceito (A, B, C, D, F): 
                    <input type="text" name="letra" maxlength="1" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['letra'])) {
                $letra = strtoupper($_POST['letra']);
                switch ($letra) {
                    case "A": echo "Excelente<br>"; break;
                    case "B": echo "Bom<br>"; break;
                    case "C": echo "Regular<br>"; break;
                    case "D": echo "Insuficiente<br>"; break;
                    case "F": echo "Reprovado<br>"; break;
                    default: echo "Conceito inválido.<br>";
                }
            }
            break;
        case 13:
            echo '<b>Meses do ano</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao2" value="13">
                    Digite um número (1 a 12): 
                    <input type="number" name="mes" min="1" max="12" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['mes'])) {
                $mes = intval($_POST['mes']);
                switch ($mes) {
                    case 1: echo "Janeiro<br>"; break;
                    case 2: echo "Fevereiro<br>"; break;
                    case 3: echo "Março<br>"; break;
                    case 4: echo "Abril<br>"; break;
                    case 5: echo "Maio<br>"; break;
                    case 6: echo "Junho<br>"; break;
                    case 7: echo "Julho<br>"; break;
                    case 8: echo "Agosto<br>"; break;
                    case 9: echo "Setembro<br>"; break;
                    case 10: echo "Outubro<br>"; break;
                    case 11: echo "Novembro<br>"; break;
                    case 12: echo "Dezembro<br>"; break;
                    default: echo "Número inválido.<br>";
                }
            }
            break;
        case 14:
            echo '<b>Operações matemáticas</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao2" value="14">
                    Digite o primeiro número: 
                    <input type="number" step="any" name="n1" required>
                    Digite o segundo número: 
                    <input type="number" step="any" name="n2" required>
                    Digite a operação (+, -, *, /): 
                    <input type="text" name="op" maxlength="1" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['n1']) && isset($_POST['n2']) && isset($_POST['op'])) {
                $n1 = floatval($_POST['n1']);
                $n2 = floatval($_POST['n2']);
                $op = $_POST['op'];
                switch ($op) {
                    case "+": echo "Resultado: " . ($n1 + $n2) . "<br>"; break;
                    case "-": echo "Resultado: " . ($n1 - $n2) . "<br>"; break;
                    case "*": echo "Resultado: " . ($n1 * $n2) . "<br>"; break;
                    case "/": 
                        echo $n2 != 0 ? "Resultado: " . ($n1 / $n2) . "<br>" : "Divisão por zero!<br>"; 
                        break;
                    default: echo "Operação inválida.<br>";
                }
            }
            break;
        case 18:
            echo '<b>Escolha de cor</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao2" value="18">
                    Digite uma cor (vermelho, verde, azul): 
                    <input type="text" name="cor" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['cor'])) {
                $cor = strtolower($_POST['cor']);
                switch ($cor) {
                    case "vermelho": echo "Cor da paixão!<br>"; break;
                    case "verde": echo "Cor da esperança!<br>"; break;
                    case "azul": echo "Cor da tranquilidade!<br>"; break;
                    default: echo "Cor não cadastrada.<br>";
                }
            }
            break;
        case 20:
            echo '<b>Meses com quantidade de dias</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao2" value="20">
                    Digite um número de 1 a 12: 
                    <input type="number" name="mes" min="1" max="12" required>
                    <button type="submit">Enviar</button>
                  </form>';
            if (isset($_POST['mes'])) {
                $mes = intval($_POST['mes']);
                switch ($mes) {
                    case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                        echo "Este mês tem 31 dias.<br>"; break;
                    case 4: case 6: case 9: case 11:
                        echo "Este mês tem 30 dias.<br>"; break;
                    case 2:
                        echo "Fevereiro tem 28 ou 29 dias (ano bissexto).<br>"; break;
                    default:
                        echo "Mês inválido.<br>";
                }
            }
            break;

        // ----------- Outros Exercícios -----------
        case 21:
            echo '<b>Contagem simples (while)</b><br>';
            $i = 1;
            while ($i <= 10) {
                echo $i . " ";
                $i++;
            }
            echo "<br>";
            break;
        case 22:
            echo '<b>Soma de números (while)</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao3" value="22">
                    Digite um número: 
                    <input type="number" name="num" required>
                    <button type="submit">Somar</button>
                  </form>';
            if (isset($_POST['num'])) {
                $num = intval($_POST['num']);
                $soma = 0;
                $i = 1;
                while ($i <= $num) {
                    $soma += $i;
                    $i++;
                }
                echo "A soma de 1 até $num é $soma.<br>";
            }
            break;
        case 23:
            echo '<b>Tabuada (while)</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao3" value="23">
                    Digite um número: 
                    <input type="number" name="num" required>
                    <button type="submit">Tabuada</button>
                  </form>';
            if (isset($_POST['num'])) {
                $num = intval($_POST['num']);
                $i = 1;
                echo "Tabuada do $num:<br>";
                while ($i <= 10) {
                    echo "$num x $i = " . ($num * $i) . "<br>";
                    $i++;
                }
            }
            break;
        case 24:
            // Adivinhação (do...while)
            session_start();
            if (!isset($_SESSION['secreto'])) {
                $_SESSION['secreto'] = rand(1, 10);
            }
            echo '<b>Adivinhação (do...while)</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao3" value="24">
                    Tente adivinhar o número secreto (1 a 10): 
                    <input type="number" name="palpite" min="1" max="10" required>
                    <button type="submit">Adivinhar</button>
                  </form>';
            if (isset($_POST['palpite'])) {
                $palpite = intval($_POST['palpite']);
                do {
                    if ($palpite == $_SESSION['secreto']) {
                        echo "Parabéns! Você acertou!<br>";
                        unset($_SESSION['secreto']);
                        break;
                    } else {
                        echo "Errou! Tente novamente.<br>";
                        break;
                    }
                } while (true);
            }
            break;
        case 25:
            // Validação de senha (do...while)
            echo '<b>Validação de senha (do...while)</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao3" value="25">
                    Digite a senha: 
                    <input type="password" name="senha" required>
                    <button type="submit">Validar</button>
                  </form>';
            if (isset($_POST['senha'])) {
                $senha = $_POST['senha'];
                do {
                    if ($senha === "1234") {
                        echo "Senha correta!<br>";
                        break;
                    } else {
                        echo "Senha incorreta!<br>";
                        break;
                    }
                } while (true);
            }
            break;
        case 26:
            // Contagem regressiva (do...while)
            echo '<b>Contagem regressiva (do...while)</b><br>';
            echo '<form method="post">
                    <input type="hidden" name="opcao3" value="26">
                    Digite um número: 
                    <input type="number" name="num" required>
                    <button type="submit">Contar</button>
                  </form>';
            if (isset($_POST['num'])) {
                $num = intval($_POST['num']);
                echo "Contagem regressiva:<br>";
                do {
                    echo $num . " ";
                    $num--;
                } while ($num >= 0);
                echo "<br>";
            }
            break;
        default:
            echo "Opção inválida ou não implementada.<br>";
    }
}
?>
</body>
</html>
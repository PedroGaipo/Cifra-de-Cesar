<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cifra de César com PHP</title>
    <style>
        body {
            text-align: center;
            background-color: #303030;
            color: white;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 2em;
        }
        input, button {
            font-size: 1.2em;
            padding: 10px;
            margin: 10px;
        }
        #resultado {
            font-size: 1.5em;
            margin-top: 20px;
            padding: 10px;
            background-color: #444;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Cifra de César com PHP</h1>
    
    <form method="post">
        <label>Digite uma mensagem:</label><br>
        <input type="text" name="message" required>
        <br>
        <label>Escolha o deslocamento:</label><br>
        <input type="number" name="shift" value="3" required>
        <br>
        <button type="submit" name="action" value="encrypt">Criptografar</button>
        <button type="submit" name="action" value="decrypt">Descriptografar</button>
    </form>

    <?php
    function caesarCipher($message, $shift, $decrypt = false) {
        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        $output = "";

        if ($decrypt) {
            $shift = -$shift; // Inverte o deslocamento para descriptografar
        }

        for ($i = 0; $i < strlen($message); $i++) {
            $char = $message[$i];

            // Verifica se o caractere está no alfabeto
            $pos = strpos($alphabet, strtolower($char));
            if ($pos !== false) {
                $newPos = ($pos + $shift) % strlen($alphabet);
                if ($newPos < 0) {
                    $newPos += strlen($alphabet);
                }
                $newChar = $alphabet[$newPos];

                // Mantém a capitalização
                $output .= ctype_upper($char) ? strtoupper($newChar) : $newChar;
            } else {
                // Mantém caracteres especiais, números e espaços
                $output .= $char;
            }
        }
        return $output;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $message = isset($_POST["message"]) ? $_POST["message"] : "";
        $shift = isset($_POST["shift"]) ? intval($_POST["shift"]) : 3;
        $action = isset($_POST["action"]) ? $_POST["action"] : "";

        if (!empty($message)) {
            if ($action == "encrypt") {
                $result = caesarCipher($message, $shift);
                echo "<div id='resultado'><strong>Criptografado:</strong> $result</div>";
            } elseif ($action == "decrypt") {
                $result = caesarCipher($message, $shift, true);
                echo "<div id='resultado'><strong>Descriptografado:</strong> $result</div>";
            }
        }
    }
    ?>
</body>
</html>

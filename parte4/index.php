<?php
$cep = "01001000"; // exemplo do site viaCEP
$url = "https://viacep.com.br/ws/{$cep}/json/";

// faz o GET
$response = file_get_contents($url);

// converte o json em array associativo
$data = json_decode($response, true);

// exibe em array PHP
print_r($data);

?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consulta CEP</title>
</head>
<body>
    <pre><?php echo htmlspecialchars(json_encode($data, JSON_UNESCAPED_UNICODE)); ?></pre>
</body>
</html>

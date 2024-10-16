
<html>

<body>
<?php
#exemple avec heredoc càd on met une string dans une variables
$bonjour = <<< EOT
       Hello World !
EOT;
echo $bonjour;

#variante
$hi = <<< quote
bonjour !
quote;
echo $hi;

#variante 2
echo <<< lol
Salut !
lol;

?>
</body>
</html>

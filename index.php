<?php
require './vendor/autoload.php';

echo "<br/>";
echo "Pacote de helpers php melhorado e reorganizado <br/> documentação/lista de funções";
echo "<br/>";
echo "<br/>";

//Gerar senhas de forma randomica
echo "genereteKey() - Gera senhas de forma randomica <br/>
    recebe um valor inteiro como parametro para o tamanho da strig, '8' é o tamanho default<br/>
    valores:<br/>
        a-b-c-d-e-f-g-h-i-j-k-l-m-n-o-p-q-r-s-t-u-v-x-y-w-z<br/>
        A-B-C-D-E-F-G-H-I-J-K-L-M-N-O-P-Q-R-S-T-U-V-X-Y-W-Z<br/>
        0-1-2-3-4-5-6-7-9-!-@-#<br/>
    ";
$key = genereteKey(12);
var_dump($key);

?>

Funções a reescrever ou estruturar documentação + api feriados:
<br/>
lib nova: suporte >> pacote orange: DateTimeDiff (Helpers) + FERIADOS (DateTimeUtils::TIME) sem API
<br/>
lib antiga: scriptcase funções antigas (DecHoras, HoraMin, etc) + time_util_diff (DateTimeUtils::TIME) com API


<?php
if (!function_exists('sumHours')) {
    /**
     * @param array $hours
     * @return float
     */
    function sumHours(array $hours): float
    {
        if (count($hours) % 2 !== 0) return 0;
        $count = null;
        $sumHours = 0;
        foreach ($hours as $key => $value)
            if ($key % 2 === 0)
                $count = hoursToDecimal($value);
            else
                $sumHours += (hoursToDecimal($value) - $count);
        return $sumHours;
    }
}

if (!function_exists('isDateInRange')) {
    /**
     * @param string $date
     * @param string $startDate
     * @param string $endDate
     * @return bool
     * @throws Exception
     */
    function isDateInRange(string $date, string $startDate, string $endDate): bool
    {
        $date = new DateTime($date);
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        return ($date >= $start && $date <= $end);
    }
}

if (!function_exists('getMonth')) {

    /**
     * Retorna o mês de acordo com paramentro
     * @param int $month
     * @return string
     */
    function getMonth(int $month): string
    {
        switch ($month){
            case 1: return 'Janeiro';
            case 2: return 'Fevereiro';
            case 3: return 'Março';
            case 4: return 'Abril';
            case 5: return 'Maio';
            case 6: return 'Junho';
            case 7: return 'Julho';
            case 8: return 'Agosto';
            case 9: return 'Setembro';
            case 10: return 'Outubro';
            case 11: return 'Novembro';
            case 12: return 'Dezembro';
            default: return '';
        }
    }
}

if (!function_exists('getFeriado')) {
    /**
     * Verifica se a data atual passada por parametro é feriado
     * Obs.:
     * Início calcula a data da Pascoa com a função easter_date() nativa do PHP,
     * Esta funcão e baseada na formula matemática "Meeus/Jones/Butcher"...
     * Por consequeincia conseguimos gerar as três datas que dependem da data da Pascoa, que são elas:
     * Canaval, Sexta-Feira Santa, Corpus Christi... Esta contagem foi definida pelo "Papa Gregório".
     * Por fim o Array é ordenado por mês com as datas dos feriados fixos + variaveis do ano/data informado.
     * @param DateTime $data
     * @return bool
     */
    function getFeriado (\DateTime $data): bool
    {
        $dataOriginal = $data->getTimestamp();
        $ano = (int) $data->format('Y');
        $pascoa = easter_date($ano);

        //Define as datas dos feriados variáveis
        $carnaval = $data->setTimestamp(strtotime('-47 day', $pascoa))->format('d/m');
        $sextaSanta = $data->setTimestamp(strtotime('-2 day', $pascoa))->format('d/m');
        $corpusChristi = $data->setTimestamp(strtotime('+60 day', $pascoa))->format('d/m');

        //Lista de feriados nacionais com as datas fixas + variáveis
        $feriados = [
            '01/01', //Ano Novo
            $carnaval,
            $sextaSanta,
            '21/04', //Tiradentes
            '01/05', //Dia do Trabalho
            $corpusChristi,
            '07/09', //Independencia
            '12/10', //Nossa Senhora
            '02/11', //Finados
            '15/11', //Proclamacao da Republia
            '25/12', //Natal
        ];

        //Recupera a data original do parametro
        $compara = $data->setTimestamp($dataOriginal)->format('d/m');

        return in_array($compara, $feriados);
    }
}

if (!function_exists('diasUteis'))
{
    /**
     * Recebe como parametro um objeto data inicial e um objeto data final e faz a contagem dos dias
     * sem considerar os dias sábado, domingo e feriados nacionais, retorna o total da contagem
     * @param DateTime $inicio
     * @param DateTime $fim
     * @return int
     */
    function diasUteis (DateTime $inicio, DateTime $fim): int
    {
        $dias = 0;

        while ($inicio < $fim)
        {
            if ($inicio->format('w') != 6 && $inicio->format('w') != 0 && getFeriado($inicio) == false)
            {
                $dias += 1;
            }
            $inicio = $inicio->add(date_interval_create_from_date_string('1 day'));
        }
        return $dias;
    }
}

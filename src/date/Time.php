<?php

class Time
{
    /** @var string */
    private $inicio;

    /** @var string */
    private $fim;

    public function __construct()
    {
        //$this->inicio = env('DATE_TIME_UTILS_INICIO', '08:00');
        //$this->fim = env('DATE_TIME_UTILS_FINAL', '18:00');
        $this->inicio = '08:00';
        $this->fim = '18:00';
    }

    /**
     * Calcula a diferença em horas comerciais entre a data informada e a horas do segundo paramentro
     * @param \DateTime $start = Data Inicial
     * @param int $horas = Horas adicionadas
     * @return \DateTime
     */
    public function addHorasUteis(\DateTime $start, int $horas): \DateTime
    {
        $vefiryFeriado = false;
        while (!$vefiryFeriado) {
            if (!getFeriado($start) && ($start->format('w') != 0 && $start->format('w') != 6))
                $vefiryFeriado = true;
            else
                $start->add(\DateInterval::createFromDateString('+1day'));
        }
        $horas_inicial = new \DateTime($start->format('Y-m-d') . $this->inicio);
        $horas_final = new \DateTime($start->format('Y-m-d') . $this->fim);

        //Realiza a adição do perido paramentrizado
        if ($start->diff($horas_final)->h < $horas) {
            $diff = $start->diff($horas_final);
            $intervalo = 'P1DT' . ($diff->h - $horas) * -1 . 'H' . $diff->i . 'M';
            $result = $horas_inicial->add(new \DateInterval($intervalo));
        } else {
            $intervalo = 'P0DT' . $horas . 'H';
            $result = $start->add(new \DateInterval($intervalo));
        }

        $vefiryFeriado = false;
        while (!$vefiryFeriado) {
            if (!getFeriado($result) && ($result->format('w') != 0 && $result->format('w') != 6))
                $vefiryFeriado = true;
            else
                $result->add(\DateInterval::createFromDateString('+1day'));
        }
        return $result;
    }

    /**
     * Calcula em horas a diferença de horas uteis de acordo com parametro.
     * Para data inicio e fim iguais considere especificar as horas, não será considerado o expediente no resultado apenas a diferença integral.
     * @param \DateTime $start
     * @param \DateTime $end
     * @return string
     * @throws \Exception
     */
    public function getHorasUteis(\DateTime $start, \DateTime $end, bool $returnString = true)
    {
        $result = [
            'dias' => 0,
            'horas' => 0,
            'minutos' => 0,
            'segundos' => 0
        ];
        $diff = $start->diff($end); var_dump($diff);

        /**
         * Adição das horas
         * @param array $result
         * @param \DateInterval $interval
         * @return array
         */
        $addHoras = function (array $result, \DateInterval $interval): array {
            $result['dias'] += $interval->d;
            $result['horas'] += $interval->h;
            $result['minutos'] += $interval->i;
            $result['segundos'] += $interval->s;
            return $result;
        };

        //Verifica se o final é maior que data inicial
        if ($diff->days > 0 || $start->format('d/m') != $end->format('d/m')) {

            //Diferença do primeiro dia util
            $firtsDay = new \DateTime($start->format('Y-m-d') . $this->fim);
            $firtsDayDiff = $start->diff($firtsDay);
            $result = $addHoras($result, $firtsDayDiff);

            //Controle loop extra (bug)
            $ultimoDia = false;

            //verifica se a diferença e mais de 1 dia
            if ($diff->days > 0) {
                for ($i = 0; $i < ($diff->days + 1); $i++) {

                    //Impede loop extra (bug)
                    if ($ultimoDia)
                        continue;

                    $start->add(\DateInterval::createFromDateString('+1day'));

                    $dateDay['i'] = new \DateTime($start->format('Y-m-d') . $this->inicio);
                    $dateDay['f'] = new \DateTime($start->format('Y-m-d') . $this->fim);

                    if ($dateDay['i']->format('Y-m-d') !== $end->format('Y-m-d')) {
                        if (!getFeriado($dateDay['i']) && ($dateDay['i']->format('w') != 0 && $dateDay['i']->format('w') != 6)) {
                            $d = $dateDay['i']->diff($dateDay['f']);
                            $result = $addHoras($result, $d);
                        }
                    } else {
                        if (!getFeriado($end) && ($end->format('w') != 0 && $end->format('w') != 6)) {
                            $d = $dateDay['i']->diff($end);
                            if ($d->invert === 0)
                                $result = $addHoras($result, $d);

                            //Controle loop extra (bug)
                            $ultimoDia = true;
                        }
                    }
                }
            } else {
                //Diferença do segundo dia util
                $start->add(\DateInterval::createFromDateString('+1day'));
                if (!getFeriado($start) && ($start->format('w') != 0 && $start->format('w') != 6)) {
                    $lastDay = new \DateTime($start->format('Y-m-d') . $this->inicio);
                    $lastDayDiff = $lastDay->diff($end);
                    $result = $addHoras($result, $lastDayDiff);
                }
            }
        } else
            $result = $addHoras($result, $diff);

        $horas = ($result['dias'] * 24) + $result['horas'] + ($result['minutos'] / 60) + (($result['segundos'] / 60) / 60);
        return $returnString ? decimalToHours($horas) : $horas;
    }
}

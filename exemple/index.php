<?php require './../vendor/autoload.php'; ?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>orangecode-helpers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

<div class="container col-md-7 mt-3 mb-5">

    <h1 class="display-6">Orangecode-Helpers</h1>
    <hr/>
    <h4>Folder root: /src</h4>
    <p>-------</p>

    <!------------------------------------------------------------------------------------------->

    <h4>folder: src/all</h4>
    <div class="accordion" id="all">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-convert" aria-expanded="false" aria-controls="flush-convert">
                    <strong>file:</strong>. convert.php
                </button>
            </h2>
            <div id="flush-convert" class="accordion-collapse collapse" data-bs-parent="#all">
                <div class="accordion-body">
                    <ul>
                        <li>
                            <code>function EnumToArray(array $enum, string $type = null): array {}</code>
                            <br/>
                            <span>Utilitário para converter um enumerador (enum) em um array associativo com diferentes formatos.</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    $dados = ['Pendente', 'Aprovado', 'Rejeitado'];

                                    var_dump(EnumToArray($dados, 'select'));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function BuildTree(array $data): array {}</code>
                            <br/>
                            <span>Realiza a montagem da estrutura de dados para componente TreeList</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    $dados = [
                                        ['id' => 1, 'parent' => null, 'name' => 'Node 1'],
                                        ['id' => 2, 'parent' => 1, 'name' => 'Node 1.1'],
                                        ['id' => 3, 'parent' => 2, 'name' => 'Node 1.1.1'],
                                        ['id' => 4, 'parent' => null, 'name' => 'Node 2']
                                    ];

                                    var_dump(BuildTree($dados));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function BuildTreeExists(array $data): array {}</code>
                            <br/>
                            <span>Realiza a montagem da árvore de dados somente com os dados selecionáveis</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    //
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function Mask(string $value, string $mask): string {}</code>
                            <br/>
                            <span>Utilizada para aplicar uma máscara a um determinado valor.</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    $cpf = '32132145699';

                                    var_dump(Mask($cpf, '###.###.###-##'));
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-keys" aria-expanded="false" aria-controls="flush-keys">
                    <strong>file:</strong>. keys.php
                </button>
            </h2>
            <div id="flush-keys" class="accordion-collapse collapse" data-bs-parent="#all">
                <div class="accordion-body">
                    <ul>
                        <li>
                            <code>function GenereteKey(int $number = 8): string {}</code>
                            <br/>
                            <span>Gera senha de forma randomica</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(GenereteKey());
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p>-------</p>

    <!------------------------------------------------------------------------------------------->

    <h4>folder: src/date</h4>
    <div class="accordion" id="date">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-hours" aria-expanded="false" aria-controls="flush-hours">
                    <strong>file:</strong>. hours.php
                </button>
            </h2>
            <div id="flush-hours" class="accordion-collapse collapse" data-bs-parent="#date">
                <div class="accordion-body">
                    <ul>
                        <li>
                            <code>function DecimalToHours(float $decimal): string {}</code>
                            <br/>
                            <span>Converte decimal para horas</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(DecimalToHours(1.5));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function HoursToDecimal(string $hours, int $decimais = 2): float {}</code>
                            <br/>
                            <span>Converte horas para decimal</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(HoursToDecimal('2:30'));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function HoursToMinute(string $value): int {}</code>
                            <br/>
                            <span>Converte horas para minuto</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(HoursToMinute('1:00'));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function MinuteToHours(int|float $valor): string</code>
                            <br/>
                            <span>Converte minutos para horas</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(MinuteToHours(65));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function SecondsToHours(int $seconds): string</code>
                            <br/>
                            <span>Converte segundos para horas</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(SecondsToHours(6000));
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-period" aria-expanded="false" aria-controls="flush-period">
                    <strong>file:</strong>. period.php
                </button>
            </h2>
            <div id="flush-period" class="accordion-collapse collapse" data-bs-parent="#date">
                <div class="accordion-body">
                    <ul>
                        <li>
                            <code>function SumHours(array $hours): float {}</code>
                            <br/>
                            <span>Soma as horas dentro de um periodo</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(SumHours(['09:00', '16:00', '10:30', '15:25']));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function IsDateInRange(string $date, string $startDate, string $endDate): bool {}</code>
                            <br/>
                            <span>Retorna se a data informada esta no range (inicio/fim)</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    $date = date('2023-05-05');
                                    $ini = date('2023-05-01');
                                    $fim = date('2023-05-10');

                                    var_dump(IsDateInRange($date, $ini, $fim));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function GetMonth(int $month): string {}</code>
                            <br/>
                            <span>Retorna no nome do mês</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(GetMonth(2));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function GetFeriado (\DateTime $data): bool {}</code>
                            <br/>
                            <span>Verifica se a data atual passada por parametro é feriado</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    var_dump(GetFeriado(new DateTime('2023-11-15')));
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>function DiasUteis (DateTime $inicio, DateTime $fim): int {}</code>
                            <br/>
                            <span>Faz a contagem dos dias sem considerar os dias sábado, domingo e feriados nacionais, retorna o total da contagem</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    $ini = new DateTime('2023-11-13');
                                    $fim = new DateTime('2023-11-17');

                                    var_dump(DiasUteis($ini, $fim));
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-Time" aria-expanded="false" aria-controls="flush-Time">
                    <strong>file:</strong>. Time.php (class)
                </button>
            </h2>
            <div id="flush-Time" class="accordion-collapse collapse" data-bs-parent="#date">
                <div class="accordion-body">
                    <ul>
                        <li>
                            <code>public function addHorasUteis(\DateTime $start, int $horas): \DateTime {}</code>
                            <br/>
                            <span>Calcula a diferença em horas comerciais entre a data informada e a horas do segundo paramentro.
                                Primeiro parametro: Data e hora, segundo parametro: horas a serem adicionadas, o resultado será
                                o dia/data com a hora total útil restante.</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    $ini = new DateTime('2023-11-14 15:05:00');
                                    $time = new Time();
                                    $result = $time->addHorasUteis($ini, 3);

                                    var_dump($result);
                                ?>
                            </span>
                        </li>
                        <li>
                            <code>public function getHorasUteis(\DateTime $start, \DateTime $end, bool $returnString = true) {}</code>
                            <br/>
                            <span>Calcula em horas a diferença de horas uteis de acordo com parametro</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                    $ini = new DateTime('2023-11-14 10:01:00');
                                    $fim = new DateTime('2023-11-16 10:02:00');
                                    $time = new Time();
                                    $result = $time->getHorasUteis($ini, $fim);

                                    var_dump($result);
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p>-------</p>

    <!------------------------------------------------------------------------------------------->

    <h4>folder: src/laravel</h4>
    <div class="accordion" id="laravel">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-view" aria-expanded="false" aria-controls="flush-view">
                    <strong>file:</strong>. view.php
                </button>
            </h2>
            <div id="flush-view" class="accordion-collapse collapse" data-bs-parent="#laravel">
                <div class="accordion-body">
                    <ul>
                        <li>
                            <code>function IsActiveRoute(string | array $route, mixed $return = 'active', mixed $falied = ""): mixed {}</code>
                            <br/>
                            <span>Verifica se a rota esta ativa.</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function ChangeEnvironmentVariable($key,$value) {}</code>
                            <br/>
                            <span>Realiza a mudança das variaveis de ambiente</span>
                            <br/>
                            <span><u>Result:</u>
                                <?php
                                //
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p>-------</p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

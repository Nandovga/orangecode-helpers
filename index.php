<?php require './vendor/autoload.php'; ?>
<?php

$test = new Time();
var_dump($test);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                            <span>Enumerados para array</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function BuildTree(array $data) {}</code>
                            <br/>
                            <span>Realiza a montagem da estrutura de dados para componente TreeList</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function mask(string $value, string $mask): string {}</code>
                            <br/>
                            <span>Aplica a mascar nas string</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function changeEnvironmentVariable($key,$value) {}</code>
                            <br/>
                            <span>Realiza a mudança das variaveis de ambiente</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
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
                            <code>function genereteKey(int $number = 8): string {}</code>
                            <br/>
                            <span>Gera senha de forma randomica</span>
                            <br/>
                            <span><u>Result:</u> <?php var_dump(genereteKey()) ?></span>
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
                            <code>function decimalToHours(float $decimal): string {}</code>
                            <br/>
                            <span>Converte decimal para horas</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function hoursToDecimal(string $hours, int $decimais = 2): float {}</code>
                            <br/>
                            <span>Converte horas para decimal</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function hoursToMinute(string $value): int {}</code>
                            <br/>
                            <span>Converte horas para minuto</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function minuteToHours(int|float $valor): string</code>
                            <br/>
                            <span>Converte minutos para horas</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function secondsToHours(int $seconds): string</code>
                            <br/>
                            <span>Converte segundos para horas</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
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
                            <code>function sumHours(array $hours): float {}</code>
                            <br/>
                            <span>Soma as horas dentro de um periodo</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function isDateInRange(string $date, string $startDate, string $endDate): bool {}</code>
                            <br/>
                            <span>Retorna se a data esta no range</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function getMonth(int $month): string {}</code>
                            <br/>
                            <span>Retorna no nome do mês</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function getFeriado (\DateTime $data): bool {}</code>
                            <br/>
                            <span>Verifica se a data atual passada por parametro é feriado</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>function diasUteis (DateTime $inicio, DateTime $fim): int {}</code>
                            <br/>
                            <span>faz a contagem dos dias sem considerar os dias sábado, domingo e feriados nacionais, retorna o total da contagem</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
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
                            <span>Calcula a diferença em horas comerciais entre a data informada e a horas do segundo paramentro</span>
                            <br/>
                            <span><u>Result:</u>
                                ..
                            </span>
                        </li>
                        <li>
                            <code>public function getHorasUteis(\DateTime $start, \DateTime $end, bool $returnString = true) {}</code>
                            <br/>
                            <span>Calcula em horas a diferença de horas uteis de acordo com parametro</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
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
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <strong>file:</strong>. view.php
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#laravel">
                <div class="accordion-body">
                    <ul>
                        <li>
                            <code>...</code>
                            <br/>
                            <span>...</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                        <li>
                            <code>...</code>
                            <br/>
                            <span>...</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <strong>file:</strong>. Cropper.php (class)
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#laravel">
                <div class="accordion-body">
                    <ul>
                        <li>
                            <code>...</code>
                            <br/>
                            <span>...</span>
                            <br/>
                            <span><u>Result:</u> <?php echo '...' ?></span>
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

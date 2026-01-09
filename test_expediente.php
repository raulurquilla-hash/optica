<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Paciente;

$pacientes = Paciente::take(5)->get(['id', 'nombre1', 'nombre2', 'apellidoP', 'apellidoM', 'expediente_medico']);

foreach ($pacientes as $p) {
    echo "ID: {$p->id} | {$p->nombre1} {$p->nombre2} {$p->apellidoP} {$p->apellidoM} | Expediente: {$p->expediente_medico}\n";
}

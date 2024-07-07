<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    // Definir la tabla si no sigue las convenciones de Laravel
    protected $table = 'partidos';

    // Campos asignables de forma masiva
    protected $fillable = [
        'id_equipo_local',
        'id_equipo_visitante',
        'jugado',
        'resultado',
        'fecha'
    ];

    // Campos protegidos (no asignables masivamente)
    protected $guarded = [];

    // Relaciones con el modelo User
    public function equipoLocal()
    {
        return $this->belongsTo(User::class, 'id_equipo_local');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(User::class, 'id_equipo_visitante');
    }

    // Si quieres manejar el campo `fecha` como una instancia Carbon
    protected $dates = ['fecha'];

    // Casts para convertir automáticamente los tipos de datos
    protected $casts = [
        'jugado' => 'boolean',  // Convertir automáticamente a booleano
        'fecha' => 'datetime',  // Convertir automáticamente a datetime
    ];
}
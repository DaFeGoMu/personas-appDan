<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'tb_pais'; // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'pais_codi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // Si tu tabla no usa created_at y updated_at

    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'pais_codi', 'pais_codi');
    }
}
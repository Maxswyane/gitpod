<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tip
 *
 * @property int $id
 * @property string $dicas
 * @property string $img_fundo
 *
 * @package App\Models
 */
class Tip extends Model
{

    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'tips';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'dicas',
		'img_fundo'
	];

public function types()
{
    return $this->hasMany(Type::class, 'id_tip');
}
}

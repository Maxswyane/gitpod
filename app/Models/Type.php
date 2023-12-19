<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 * 
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property int $id_produto
 * @property float $valor
 * 
 * @property Product $product
 * @property Collection|Photo[] $photos
 *
 * @package App\Models
 */
class Type extends Model
{
	protected $table = 'types';
	public $timestamps = false;

	protected $casts = [
		'id_produto' => 'int',
		'valor' => 'float'
	];

	protected $fillable = [
		'titulo',
		'descricao',
		'id_produto',
		'valor'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'id_produto');
	}

	public function photos()
	{
		return $this->hasMany(Photo::class, 'id_sabor');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property int $id
 * @property string $descricao
 * @property string $titulo
 * @property int $valor
 *
 * @property Collection|Type[] $types
 *
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
	protected $table = 'products';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'valor' => 'int'
	];

	protected $fillable = [
		'descricao',
		'titulo',
		'valor'
	];

	public function types()
	{
		return $this->hasMany(Type::class, 'id_produto');
	}
}

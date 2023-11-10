<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property int $id_produto
 *
 * @property Product $product
 * @property Collection|Photo[] $photos
 *
 * @package App\Models
 */
class Type extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
	protected $table = 'types';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'id_produto' => 'int'
	];

	protected $fillable = [
		'titulo',
		'descricao',
		'id_produto'
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

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 *
 * @property int $id
 * @property string $arquivo
 * @property string $local_foto
 * @property int $id_sabor
 *
 * @property Type $type
 *
 * @package App\Models
 */
class Photo extends Model
{
        use HasFactory;
    protected $guarded = ['id'];
	protected $table = 'photos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'id_sabor' => 'int'
	];

	protected $fillable = [
		'arquivo',
		'local_foto',
		'id_sabor'
	];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}

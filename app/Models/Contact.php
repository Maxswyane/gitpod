<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 * 
 * @property string $instagram
 * @property string $youtube
 * @property int $endereco
 * @property string $email
 * @property int $telefone
 * @property int $id
 *
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contacts';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'endereco' => 'int',
		'telefone' => 'int',
		'id' => 'int'
	];

	protected $fillable = [
		'instagram',
		'youtube',
		'endereco',
		'email',
		'telefone'
	];
}

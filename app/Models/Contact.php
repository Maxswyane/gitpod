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
 * @property string $endereco
 * @property string $email
 * @property string $telefone
 * @property int $id
 *
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contacts';
	public $timestamps = false;

	protected $fillable = [
		'instagram',
		'youtube',
		'endereco',
		'email',
		'telefone'
	];
}

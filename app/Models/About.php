<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


/**
 * Class About
 *
 * @property string $quem_somos
 * @property string $o_que_vendemos
 * @property int $id
 * @property string $img_esquerda
 *
 * @package App\Models
 */
class About extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }


	protected $table = 'about';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'quem_somos',
		'o_que_vendemos',
		'img_esquerda'
	];
}

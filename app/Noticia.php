<?php  



namespace GestorBackend;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
	protected $table = 'noticias';

	protected $fillable = [
		'titulo','foto_principal','sintesis','cuerpo','reportero','clasificacion','foto1','foto2','foto3','fecha','user_id'
	];

	public $timestamps = false;

	public function reportero()
    {
        return $this->belongsTo('GestorBackend\User');
    }



}
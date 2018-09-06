<?php  



namespace GestorBackend;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
	protected $table = 'noticias';

	protected $fillable = ['titulo','foto_principal','sintesis','cuerpo','reportero','cedula_reportero','clasificacion','foto1','foto2','foto3','fecha'];

	public $timestamps = false;

	public function reportero()
    {
        return $this->belongsTo('GestorBackend\User');
    }



}
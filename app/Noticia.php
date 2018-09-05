<?php  



namespace GestorBackend;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
	protected $table = 'noticias';

	protected $fillable = ['titulo','foto_principal','sintesis','cuerpo','reportero','cedula','clasificacion','foto1','foto2','foto3','fecha'];

	public function reportero()
    {
        return $this->belongsTo('GestorBackend\User');
    }



}
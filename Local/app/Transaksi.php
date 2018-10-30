<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table ='transaksi';

    protected $primaryKey = 'id';

    protected $fillable = [ 
       		'jenis_transaksi',
       	'nama',
       	'nominal', 	
       	'deskripsi',
       	]; 	
}

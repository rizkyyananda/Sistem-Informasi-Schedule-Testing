<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan_schetes';
    protected $fillable =
     ['id','nama_customer','alamat','date','waktu','pic','no_hp','partner','teknisi','tipe_test'];

}

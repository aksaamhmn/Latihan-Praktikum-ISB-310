<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'category_name'
    ];

    // Relasi One-to-Many: Satu kategori memiliki banyak produk
    public function products()
    {
        return $this->hasMany(product::class, 'category_id', 'category_id');
    }
}

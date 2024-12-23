<?php

// app/Models/Supplier.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['name', 'contact_name', 'phone', 'email', 'address'];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    protected $table = 'companies'; // Name of the corresponding database table

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Define relationships with other models (e.g., Employee)
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

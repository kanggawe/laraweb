<?php
// app/Models/Billing.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

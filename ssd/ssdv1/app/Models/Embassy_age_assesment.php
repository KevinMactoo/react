<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Embassy_age_assesment extends Model
{
    use HasFactory;
    
    protected $table = 'age_assessment';

    protected $dateFormat = 'Y-m-d';

    protected $fillable = ['user_id', 'place_of_birth', 'date_of_birth', 'serial_number', 'date_of_application', 'name_of_applicant', 'phone_number'];
}
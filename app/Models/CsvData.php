<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{
    protected $table = 'csv_data';
    protected $fillable = ['id', 'name','domain', 'year_founded','industry', 'size_range','locality', 'country','linkedin_url', 'current_employee_estimate'];
}
?>
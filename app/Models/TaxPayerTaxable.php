<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxPayerTaxable extends Model
{
     use HasFactory;

     protected $table = 'tp_taxable';
     protected $primaryKey = 'TPTaxableId ';
     public $timestamps = false;

     public function tax_payer(){
       return $this->belongsTo('App\Models\TaxPayerTaxable', 'TaxPayerId');
     }

     protected $fillable = [
        'TPtaxableId',
        'TaxPayerId',
        'TaxableId',
        'Length',
        'Width',
        'Area',
        'OccupancyContract',
        'Reference',
        'PaymentFrequency',
        'Amount',
        'MunicipalId',
        'ZoneId',
        'UserId',
        'Altitute',
        'AddedDate',
        'AddedId',
      ];

}

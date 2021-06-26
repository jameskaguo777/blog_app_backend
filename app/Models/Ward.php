<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Ward extends Model
{
    use HasFactory, SpatialTrait;

    protected $fillable = [ 'name', 'coordinates', 'status', 'activation_code', 'activation_status' ];

    protected
        $spatialFields = [
            'coordinates'
        ];

    protected $appends = [
        'status_a',
        'activation_code_status_a'
    ];

    public function getActivationCodeStatusAAttribute(){
        return ($this->activation_status) ? 'Active' : 'Deactivated';
    }

    public function getStatusAAttribute(){
        return ($this->status) ? 'Active' : 'Deactivated' ;
    }

    public function competitionWinner(){
        return $this->morphMany(CompetitionWinner::class, 'competition_winnerable');
    }

    public function assigned()
    {
        return $this->morphMany(Assigned::class, 'assignable');
    }

}

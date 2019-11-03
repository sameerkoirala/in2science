<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'volunteers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uniEmail', '$id', 'phone','year','semester','firstName','surname','pEmail','gender',
        'address','ownCar','rideBike','university','extra','mainCampus','studId','degreeYear','degree','major','year12',
        'mentorOldSchool','year12_Subjects','mentoringMethod','mentoringSubject','interest','skills','heardAbout'];


}

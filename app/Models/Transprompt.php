<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transprompt extends Model
{
    use HasFactory;
            /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'translator_prompts';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'transprompt_id';   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'result'];
}

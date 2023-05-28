<?php

namespace App\Http\Controllers;

use App\Models\Exercises;
use App\Models\TrainingType;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //



    public function wod() {
        $trainingTypes = TrainingType::all();

        return view('Wod', ['trainingTypes' =>$trainingTypes]);
    }
}

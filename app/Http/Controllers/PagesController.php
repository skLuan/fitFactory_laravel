<?php

namespace App\Http\Controllers;

use App\Models\Exercises;
use App\Models\Repetitions;
use App\Models\Routines;
use App\Models\TrainingType;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //



    public function wod() {
        $trainingTypes = TrainingType::all();
        $routines = Routines::all();

        return view('Wod', ['trainingTypes' =>$trainingTypes, 'routines' => $routines]);
    }

    public function newReps(Request $request, Routines $routine){
        $localreps = $request->reps;
        $localexes = $request->exercises;

        foreach ($localreps as $i => $rep) {
            $exe = $localexes[$i];

            if(!isset($rep) || !isset($exe)) return;
            if($rep <= 0 || $exe === '') return;
            $newRep = new Repetitions;
            $newRep->reps = $rep;
            // $newRep->exercise_id = null;
            $newRep->name = $localexes[$i];

            $newRep->save();
            $newRep->routines()->attach($routine->id);
        }

    }

    public function newRoutine(Request $request){
        $newRoutine = new Routines;
        $typeId = $request->trainingType;
        $type = TrainingType::find($typeId);

        // $type->routines()->save($newRoutine);
        $newRoutine->trainingType()->associate($type);
        $newRoutine->save();
        $this->newReps($request, $newRoutine);
        return redirect()->back()->send(['message' => 'success!']);
    }
}

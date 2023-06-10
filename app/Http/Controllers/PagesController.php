<?php

namespace App\Http\Controllers;

use App\Models\Exercises;
use App\Models\Repetitions;
use App\Models\Routines;
use App\Models\TrainingType;
use App\Models\Wods;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function home()
    {
        return view('home');
    }

    public function wod()
    {
        $trainingTypes = TrainingType::all();
        $routines = Routines::all();

        return view('Wod', ['trainingTypes' => $trainingTypes, 'routines' => $routines]);
    }

    public function newReps(Request $request, Routines $routine)
    {
        $localreps = $request->reps;
        $localexes = $request->exercises;

        foreach ($localreps as $i => $rep) {
            $exe = $localexes[$i];

            if (!isset($rep) || !isset($exe)) return;
            if ($rep <= 0 || $exe === '') return;
            $newRep = new Repetitions;
            $newRep->reps = $rep;
            // $newRep->exercise_id = null;
            $newRep->name = $localexes[$i];

            $newRep->save();
            $newRep->routines()->attach($routine->id);
        }
    }

    public function newRoutine(Request $request)
    {
        $newRoutine = new Routines;
        $typeId = $request->trainingType;
        $routineRep = $request->RoutineReps;
        $type = TrainingType::find($typeId);

        // $type->routines()->save($newRoutine);
        $newRoutine->trainingType()->associate($type);
        !isset($routineRep) ? $routineRep = 1 : '';
        $newRoutine->routine_reps = $routineRep;
        $newRoutine->save();
        $this->newReps($request, $newRoutine);
        return redirect()->back()->send(['message' => 'success!']);
    }
    public function createWod(Request $request)
    {
        $idsroutines = json_decode($request->hiddenRoutines);
        $newWod = new Wods;
        $newWod->wod_name = $request->realWodName;
        $newWod->save();
        foreach ($idsroutines as $id) {
            $newWod->routines()->attach($id);
        }
        return 'new wod Created!';
    }
}

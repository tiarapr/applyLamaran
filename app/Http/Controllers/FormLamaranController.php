<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// models
use App\Models\Candidate;
use App\Models\Skill;
use App\Models\SkillSet;
use App\Models\Job;

// resources
use App\Http\Resources\CandidateResourceShort;
use App\Http\Resources\CandidateCollection;

// controllers
use App\Http\Controllers\SkillSetController;
use App\Http\Resources\SkillSetResourceShort;
use App\Http\Resources\SkillSetCollection;
use App\Http\Resources\JobResourceShort;
use App\Http\Resources\JobCollection;

class FormLamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Candidate::all();

        foreach ($items as $item) {
            $skillsSet = SkillSet::where('candidate_id', $item->id)->get();
            foreach ($skillsSet as $skillSet) {
                $skill_set[] = new SkillSetResourceShort($skillSet);
            }
            $item->skills = new SkillSetCollection($skill_set);

            $jobs = Job::where('id', $item->job_id)->get();
            foreach ($jobs as $job) {
                $jb[] = new JobResourceShort($job);
            }
            $item->jobs = new JobCollection($jb);
        }
        $results[] = $item;

        return response()->json([
            'status' => 200,
            'data' => new CandidateCollection($results),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = Job::find($request->jobId);
        if ($job === null) {
            return response()->json([
                'message' => 'Job could not be found.',
            ], Response::HTTP_NOT_FOUND);
        }

        $skill = Skill::find($request->skillId);
        if ($skill === null) {
            return response()->json([
                'message' => 'Skill could not be found.',
            ], Response::HTTP_NOT_FOUND);
        }

        DB::beginTransaction();
        try {
            $item = new Candidate;
            $item->job_id = $job->id;
            $item->name = $request->name;
            $item->email = $request->email;
            $item->phone = $request->phone;
            $item->year = $request->year;
            $item->created_at = Carbon::now();
            $item->updated_at = Carbon::now();

            $item->save();

            $item->created_by = $item->id;
            $item->updated_by = $item->id;

            $item->save();

            // add skills set
            $skillSet = new SkillSet;
            $skillSet->candidate_id = $item->id;
            $skillSet->skill_id = $skill->id;
            $item->created_at = Carbon::now();
            $item->updated_at = Carbon::now();

            $skillSet->save();

            $item->skills = new SkillSetResourceShort($skillSet);

            $item->jobs = new JobResourceShort($job);

            DB::commit();

            return response()->json([
                'data' => new CandidateResourceShort($item),
            ], Response::HTTP_CREATED);
        } catch (\Throwable $ex) {
            DB::rollback();
            return response()->json(['message' => $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

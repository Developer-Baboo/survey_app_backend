<?php

namespace App\Http\Controllers\Api;
use App\Models\Survey;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Dummy implementation - fetch all surveys
        $surveys = Survey::all();
        return response()->json(['surveys' => $surveys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Define custom error messages
        $messages = [
            'required' => ':attribute is required',
            'string' => ':attribute must be a string',
            'integer' => ':attribute must be an integer',
            'numeric' => ':attribute must be numeric',
            'min' => ':attribute must be at least :min',
            'in' => 'Invalid :attribute value',
            'date' => 'Invalid :attribute format',
            'max' => ':attribute cannot exceed :max characters',
        ];

        // Validate incoming request data with custom error messages
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:profile,survey',
            'name' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
            'full_reward' => 'required|numeric|min:0.01',
            'timer_hours' => 'required|integer|min:1',
            'reduced_reward' => 'required|numeric|min:0.01',
            'expiry' => 'required|date',
            'status' => 'required|integer|in:0,1',
        ], $messages);

        // If validation fails, return JSON response with validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Validation passed, create the survey record
        $survey = Survey::create($validator->validated());

        // Return JSON response with the created survey and status code 201 (Created)
        return response()->json([
            'message' => 'Survey created successfully',
            'survey' => $survey
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Dummy implementation - fetch a specific survey
        $survey = Survey::findOrFail($id);
        return response()->json(['survey' => $survey]);
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
        // Dummy implementation - update a specific survey
        $survey = Survey::findOrFail($id);
        $survey->update($request->all());
        return response()->json(['survey' => $survey]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Dummy implementation - delete a specific survey
        $survey = Survey::findOrFail($id);
        $survey->delete();
        return response()->json(null, 204);
    }
}

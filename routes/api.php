<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/all_users', [App\Http\Controllers\UserController::class, 'all_users']);


//Auto Suggestion
Route::get('/getEmployees', [App\Http\Controllers\AutoSuggationController::class, 'getEmployees']);
Route::get('/getDepmartment', [App\Http\Controllers\AutoSuggationController::class, 'getDepmartment']); 


//Daily Issue Report
Route::get('/getissueAcknowledged', [App\Http\Controllers\DailyIssueReportController::class, 'getAcknowledged']);
Route::get('/getissueOngoing', [App\Http\Controllers\DailyIssueReportController::class, 'getissueOngoing']);
Route::get('/getissueRejected', [App\Http\Controllers\DailyIssueReportController::class, 'getissueRejected']);

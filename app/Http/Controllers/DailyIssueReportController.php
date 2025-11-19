<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DailyIssueReportController extends Controller
{
    public function getAcknowledged()
    {
        
        $issues = DB::select("SELECT 
                    pm_m.id AS issue_id, 
                    pm_m.created_by, 
                    pm_m.project_name AS project_code, 
                    fun_get_emp_name(pm_m.created_by) AS created_by_name,
                    fun_get_project_name(pm_m.project_name) AS project_name, 
                    pm_m.date AS pm_date, 
                    pm_m.status AS submit_status,
                    pm_d.id AS detail_id,
                    pm_d.pm_ho_feedback,
                    pm_d.pm_feedback,
                    pm_d.issue_type as issue_type,
                    pm_d.issue_details,
                    pm_d.concern_department,
                    pm_d.expect_date,
                    pm_d.assigned_person,
                    pm_d.project_status,
                    fun_get_department_name(pm_d.concern_department) AS concern_department_name,
                    fun_get_emp_name( pm_d.assigned_person) AS assigned_person_by_name
                FROM 
                    pm_issue_details pm_d 
                LEFT JOIN 
                    pm_issue_master pm_m ON pm_m.id = pm_d.issue_id
              
                   WHERE pm_d.pm_ho_feedback = 'acknowledged'
                ORDER BY 
                    pm_m.id DESC");

        return response()->json([
            'message' => 'Acknowledged issues retrieved successfully',
            'data' => $issues
        ]);
    }


        public function getissueOngoing()
    {
        
        $issues = DB::select("SELECT 
                    pm_m.id AS issue_id, 
                    pm_m.created_by, 
                    pm_m.project_name AS project_code, 
                    fun_get_emp_name(pm_m.created_by) AS created_by_name,
                    fun_get_project_name(pm_m.project_name) AS project_name, 
                    pm_m.date AS pm_date, 
                    pm_m.status AS submit_status,
                    pm_d.id AS detail_id,
                    pm_d.pm_ho_feedback,
                    pm_d.pm_feedback,
                    pm_d.issue_type as issue_type,
                    pm_d.issue_details,
                    pm_d.concern_department,
                    pm_d.expect_date,
                    pm_d.assigned_person,
                    pm_d.project_status,
                    fun_get_department_name(pm_d.concern_department) AS concern_department_name,
                    fun_get_emp_name( pm_d.assigned_person) AS assigned_person_by_name
                FROM 
                    pm_issue_details pm_d 
                LEFT JOIN 
                    pm_issue_master pm_m ON pm_m.id = pm_d.issue_id
              
                   WHERE pm_d.pm_ho_feedback = 'ongoing'
                ORDER BY 
                    pm_m.id DESC");

        return response()->json([
            'message' => 'Ongoing issues retrieved successfully',
            'data' => $issues
        ]);
    }

    public function getissueRejected()
    {
        
        $issues = DB::select("SELECT 
                    pm_m.id AS issue_id, 
                    pm_m.created_by, 
                    pm_m.project_name AS project_code, 
                    fun_get_emp_name(pm_m.created_by) AS created_by_name,
                    fun_get_project_name(pm_m.project_name) AS project_name, 
                    pm_m.date AS pm_date, 
                    pm_m.status AS submit_status,
                    pm_d.id AS detail_id,
                    pm_d.pm_ho_feedback,
                    pm_d.pm_feedback,
                    pm_d.issue_type as issue_type,
                    pm_d.issue_details,
                    pm_d.concern_department,
                    pm_d.expect_date,
                    pm_d.assigned_person,
                    pm_d.project_status,
                    fun_get_department_name(pm_d.concern_department) AS concern_department_name,
                    fun_get_emp_name( pm_d.assigned_person) AS assigned_person_by_name
                FROM 
                    pm_issue_details pm_d 
                LEFT JOIN 
                    pm_issue_master pm_m ON pm_m.id = pm_d.issue_id
              
                   WHERE pm_d.pm_ho_feedback = 'rejected'
                ORDER BY 
                    pm_m.id DESC");

        return response()->json([
            'message' => 'Rejected issues retrieved successfully',
            'data' => $issues
        ]);
    }
}

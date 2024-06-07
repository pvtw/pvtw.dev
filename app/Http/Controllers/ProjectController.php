<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

final class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $projects = Cache::rememberForever('projects.index', function () {
            return Project::latest('started_at')->get();
        });
        
        return view('pages.projects', [
            'projects' => $projects,
        ]);
    }
}

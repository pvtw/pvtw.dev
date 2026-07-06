<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

final class ProjectController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        /** @var Collection<int, Project> $projects */
        $projects = Cache::tags(['projects'])->rememberForever('projects.index', function (): Collection {
            return Project::query()
                ->latest('started_at')
                ->get();
        });

        return view('pages::projects', [
            'projects' => $projects,
        ]);
    }
}

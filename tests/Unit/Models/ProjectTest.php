<?php

declare(strict_types=1);

use App\Models\Project;

test('project has attributes', function (): void {
    $project = Project::factory()->create()->refresh();
    $keys = array_keys($project->toArray());

    expect($keys)->toBe([
        'id',
        'title',
        'description',
        'repository_url',
        'repository_label',
        'started_at',
        'finished_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ]);
});

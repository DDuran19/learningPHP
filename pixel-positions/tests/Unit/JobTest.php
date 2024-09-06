<?php

use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {

    // User::factory()->create();
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id
    ]);

    expect($job->employer->is($employer))->toBeTrue();
});

it('can have many tags', function () {
    // Arrange
    $job = Job::factory()->create();
    // Act
    $job->tag('Frontend');
    
    // Assert
    expect($job->tags)->toHaveCount(1);
});
<?php

// Home
Breadcrumbs::for('Dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Add Grades
Breadcrumbs::for('Grades', function ($trail) {
    $trail->parent('Dashboard');
    $trail->push('Grades', route('admin.grade'));
});
//1111111111111111111111111111111111111111
Breadcrumbs::for('Edit-grades', function ($trail) {
    $trail->parent('Grades');
    $trail->push('Edit-grades', route('grade.edit',[2]));
});
Breadcrumbs::for('Edit-Class', function ($trail) {
    $trail->parent('Edit-grades');
    $trail->push('Edit-class', route('edit.class',[3,9]));
});
Breadcrumbs::for('Teacher', function ($trail) {
    $trail->parent('Dashboard');
    $trail->push('Add teacher', route('admin.teacher'));
});
Breadcrumbs::for('Student', function ($trail) {
    $trail->parent('Dashboard');
    $trail->push('Add student', route('admin.student'));
});
// Breadcrumbs::for('Grades', function ($trail) {
//     $trail->parent('Dashboard');
//     $trail->push('Grades', route('admin.grade'));
// });
// Breadcrumbs::for('Grades', function ($trail) {
//     $trail->parent('Dashboard');
//     $trail->push('Grades', route('admin.grade'));
// });
// Breadcrumbs::for('Grades', function ($trail) {
//     $trail->parent('Dashboard');
//     $trail->push('Grades', route('admin.grade'));
// });
// Breadcrumbs::for('Grades', function ($trail) {
//     $trail->parent('Dashboard');
//     $trail->push('Grades', route('admin.grade'));
// });
// Breadcrumbs::for('Grades', function ($trail) {
//     $trail->parent('Dashboard');
//     $trail->push('Grades', route('admin.grade'));
// });
// Breadcrumbs::for('Grades', function ($trail) {
//     $trail->parent('Dashboard');
//     $trail->push('Grades', route('admin.grade'));
// });
// Breadcrumbs::for('Grades', function ($trail) {
//     $trail->parent('Dashboard');
//     $trail->push('Grades', route('admin.grade'));
// });


// // Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });
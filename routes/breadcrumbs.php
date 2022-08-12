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
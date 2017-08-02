<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('ទំព័រដើម', route('home'));
});
// Home > Borrower
Breadcrumbs::register('borrower', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('អតិថិជន', route('borrower'));
});
// Home > Blog > New Borroser
Breadcrumbs::register('new_borrower', function($breadcrumbs)
{
    $breadcrumbs->parent('borrower');
    $breadcrumbs->push('អតិថិជនថ្មី', route('new_borrower'));
});




// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});
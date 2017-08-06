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

// Home > Borrower Loan
Breadcrumbs::register('borrower_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('តារាងប្រាក់កម្ចី', route('borrower_loan'));
});


// Home > Borrower > New Borrower
Breadcrumbs::register('new_borrower', function($breadcrumbs)
{
    $breadcrumbs->parent('borrower');
    $breadcrumbs->push('អតិថិជនថ្មី', route('new_borrower'));
});
// Home > Setting Loan
Breadcrumbs::register('setting_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('ប្រភេទកម្ចី', route('setting_loan'));
});
// Home > Setting Loan > New Setting Loan
Breadcrumbs::register('new_setting_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('setting_loan');
    $breadcrumbs->push('ប្រភេទកម្ចីថ្មី​', route('new_setting_loan'));
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
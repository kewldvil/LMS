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
    $breadcrumbs->push('អតិថិជន', route('borrower.index'));
});

// Home > Borrower Loan
Breadcrumbs::register('borrower_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('តារាងប្រាក់កម្ចី', route('borrower_loan.index'));
});
// Home > Borrower Loan> New Borrower Loan
Breadcrumbs::register('new_borrower_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('borrower_loan');
    $breadcrumbs->push('បន្ថែមប្រាក់កម្ចីថ្មី', route('borrower_loan.create'));
});
// Home > Borrower Loan> Update Borrower Loan
Breadcrumbs::register('update_borrower_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('borrower_loan');
    $breadcrumbs->push('កែប្រែប្រាក់កម្ចី', route('borrower_loan.create'));
});
// Home > Borrower Loan> Cut Up Borrower Loan
Breadcrumbs::register('cut_up_borrower_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('borrower_loan');
    $breadcrumbs->push('កាត់ឡើងប្រាក់កម្ចី', route('borrower_loan.create'));
});

// Home > Borrower > New Borrower
Breadcrumbs::register('new_borrower', function($breadcrumbs)
{
    $breadcrumbs->parent('borrower');
    $breadcrumbs->push('អតិថិជនថ្មី', route('borrower.create'));
});
// Home > Setting/Loan
Breadcrumbs::register('loan', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('ប្រភេទកម្ចី', route('loan.index'));
});
// Home > Setting/Loan > New Loan
Breadcrumbs::register('new_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('loan');
    $breadcrumbs->push('ប្រភេទកម្ចីថ្មី​', route('loan.create'));
});
// Home > Setting/Loan > Update Loan
Breadcrumbs::register('update_loan', function($breadcrumbs)
{
    $breadcrumbs->parent('loan');
    $breadcrumbs->push('កែប្រែប្រភេទកម្ចី​', route('loan.create'));
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
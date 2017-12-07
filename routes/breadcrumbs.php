<?php

Breadcrumbs::register('users-index', function ($breadcrumbs) {
    $breadcrumbs->push('Home', url('home'));
    $breadcrumbs->push('Gebruikersbeheer', route('admin.users.index'));
});

Breadcrumbs::register('users-create', function ($breadcrumbs) {
    $breadcrumbs->push('Home', url('home'));
    $breadcrumbs->push('Gebruikersbeheer', route('admin.users.index'));
    $breadcrumbs->push('Nieuwe gebruiker', route('admin.users.create'));
});
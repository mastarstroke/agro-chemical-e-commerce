<?php

// Function for active sidebar menu from both admin and courier dashboards
function isActive($url)
{
    return Request::is($url) ? 'active' : '';
}

// Function to leave the 'company mgt' menu open from the admin dashboard
function isMenuOpen($url)
{
    return Request::is($url) ? 'menu-open' : '';
}
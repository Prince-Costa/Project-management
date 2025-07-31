<?php

function isAdmin()
{
    if (!auth()->check()) {
        return false;
    }

    return auth()->user()->role === 'admin';
}
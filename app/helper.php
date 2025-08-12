<?php

use Illuminate\Support\Facades\Auth;

function isSuperAdmin() {
    return Auth::user()->roleid === 1;
}

function isAdmin() {
    return Auth::user()->roleid === 2;
}

function isMember() {
    return Auth::user()->roleid === 3;
}
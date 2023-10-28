<?php
function setPage($chat_id, $page)
{
    file_put_contents(filename: 'users/' . $chat_id . 'page.txt', data: $page);
}
function getPage($chat_id)
{
    return file_get_contents(filename: 'users/' . $chat_id . 'page.txt');
}

function setMassa($chat_id, $massa)
{
    file_put_contents(filename: 'users/' . $chat_id . 'massa.txt', data: $massa);
}

function getMassa($chat_id)
{
    return file_get_contents(filename: 'users/' . $chat_id . 'massa.txt');
}

function setPhone($chat_id, $phone)
{
    file_put_contents(filename: 'users/' . $chat_id . 'phone.txt', data: $phone);
}

function getPhone($chat_id)
{
    file_get_contents(filename: 'users/' . $chat_id . 'phone.txt');
}

function setLatitude($chat_id, $latitude) {
    file_put_contents('users/' . $chat_id . 'latitude.txt', $latitude);
}

function getLatitude($chat_id) {
    return file_get_contents('users/' . $chat_id . 'latitude.txt');
}

function setLongitude($chat_id, $longitude) {
    file_put_contents('users/' . $chat_id . 'longitude.txt', $longitude);
}

function getLongitude($chat_id) {
    return file_get_contents('users/' . $chat_id . 'longitude.txt');
}
<?php

/**
 *	Configuration file for datastorage of
 *	a generic item testitem
 *
 * @brief
 * @details		Definition des champs de la table Trash
 *
 * @author		Artiom FEDOROV
 *
 */

/*
$fields['testtext']['type'] = 'text';
$fields['testtext']['label'] = 'Test text';

$fields['created']['type'] = 'datetime';
$fields['created']['label'] = 'Creation date';
*/

$fields = [
    'label' => [
        'type' => 'text',
        'label' => 'Test text'
    ],
    'user_id' => [
        'type' => 'int',
        'label' => 'User ID'
    ],
    'created' => [
        'type' => 'text',
        'label' => 'Test text'
    ],
    'updated' => [
        'type' => 'datetime',
        'label' => 'Creation date'
    ],
];

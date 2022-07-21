<?php


namespace App\Enums;

enum PanierStatus: string
{
    case Pending = 'pending';
    case Available = 'available';
    case Unavailable = 'unavailable';
}

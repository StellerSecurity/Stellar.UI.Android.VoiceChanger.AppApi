<?php

namespace App;

enum SubscriptionStatus: int
{

    case INACTIVE = 0;
    case ACTIVE = 1;

    case TRIAL = 2;

}
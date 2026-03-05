<?php

namespace Bydn\ImprovedPageCache\Model\WarmItem;

class Status
{
    public const NEW = 1;
    public const PROCESSING = 2;
    public const DONE = 3;
    public const ERROR = 4;
}
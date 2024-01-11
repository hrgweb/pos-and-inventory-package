<?php

namespace Hrgweb\PosAndInventory\Domain\Order\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case VOID = 'void';
}

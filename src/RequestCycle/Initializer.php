<?php

declare(strict_types=1);

/*
 * @author mfris
 */

namespace PixelFederation\DoctrineResettableEmBundle\RequestCycle;

interface Initializer
{
    public function initialize(): void;
}

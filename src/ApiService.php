<?php

namespace Markix;

abstract class ApiService
{
    public function __construct(protected MarkixClient $client)
    {
        //
    }
}

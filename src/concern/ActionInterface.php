<?php

namespace temporary\action\concern;

interface ActionInterface
{
    public function handle();

    public function encode();

    public function decode();
}
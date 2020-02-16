<?php
declare(strict_types = 1);

namespace Embed\Detectors;

use Embed\Extractor;

abstract class Detector
{
    protected Extractor $extractor;
    private $cache;

    public function __construct(Extractor $extractor)
    {
        $this->extractor = $extractor;
    }

    public function get()
    {
        if ($this->cache === null) {
            $this->cache = [
                'cached' => true,
                'value' => $this->detect(),
            ];
        }

        return $this->cache['value'];
    }

    abstract public function detect();
}

<?php

namespace Dgene\AliOSS\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

class SignedDownloadUrl extends AbstractPlugin
{
    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'signedDownloadUrl';
    }

    /**
     * Handle.
     *
     * @param string $path
     * @param $name
     * @param int $expires
     * @return string|false
     */
    public function handle($path, $name = null, $expires = 3600)
    {
        if (! method_exists($this->filesystem, 'getAdapter')) {
            return false;
        }

        if (! method_exists($this->filesystem->getAdapter(), 'getSignedDownloadUrl')) {
            return false;
        }

        return $this->filesystem->getAdapter()->getSignedDownloadUrl($path, $name, $expires);
    }
}
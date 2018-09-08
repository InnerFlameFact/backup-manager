<?php

/*
 * This file is part of the MangaHub package.
 *
 * (c) MangaHub <http://mangahub.ru/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BackupManager\Filesystems;

use BackblazeB2\Client;
use League\Flysystem\Filesystem as Flysystem;
use Mhetreramesh\Flysystem\BackblazeAdapter;

/**
 * Class BackblazeFilesystem
 * @package BackupManager\Filesystems
 */
class BackblazeFilesystem implements Filesystem {

    /**
     * Test fitness of visitor.
     * @param $type
     * @return bool
     */
    public function handles($type) {
        return strtolower($type) == 'b2';
    }

    /**
     * @param array $config
     * @return Flysystem
     */
    public function get(array $config) {
        $client = new Client($config['accountId'], $config['key']);
        return new Flysystem(new BackblazeAdapter($client, $config['bucket']));
    }
}
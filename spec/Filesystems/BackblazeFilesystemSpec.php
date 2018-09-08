<?php

namespace spec\BackupManager\Filesystems;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BackblazeFilesystemSpec extends ObjectBehavior {

    function it_is_initializable() {
        $this->shouldHaveType('BackupManager\Filesystems\BackblazeFilesystem');
    }

    function it_should_recognize_its_type_with_case_insensitivity() {
        foreach (['b2', 'B2'] as $type) {
            $this->handles($type)->shouldBe(true);
        }

        foreach ([null, 'foo'] as $type) {
            $this->handles($type)->shouldBe(false);
        }
    }

    function it_should_provide_an_instance_of_an_b2_filesystem() {
        $this->get($this->getConfig())->getAdapter()->shouldHaveType('Mhetreramesh\Flysystem\BackblazeAdapter');
    }

    function getConfig() {
        return [
            'key'       => '0011c5e325537a434339d02b7e5aec6c96a5643dc3',
            'accountId' => 'e9cea98d9a3c',
            'bucket'    => 'bucket'
        ];
    }
}

<?php
namespace PhpCoinD\Protocol\Payload;


use PhpCoinD\Protocol\Component\Hash;
use PhpCoinD\Protocol\Packet\Payload;

class GetBlocks implements Payload {
    /**
     * @PhpCoinD\Annotation\Serializable(type = "uint32")
     * @var int
     */
    public $version;

    /**
     * @PhpCoinD\Annotation\Set(set_type = "PhpCoinD\Protocol\Component\Hash")
     * @var Hash[]
     */
    public $block_locator_hashes;

    /**
     * @PhpCoinD\Annotation\Serializable(type = "PhpCoinD\Protocol\Component\Hash")
     * @var Hash
     */
    public $hash_stop;
} 
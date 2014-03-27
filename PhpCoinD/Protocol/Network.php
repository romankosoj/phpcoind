<?php
namespace PhpCoinD\Protocol;
use PhpCoinD\Protocol\Payload\Block;
use PhpCoinD\Storage\Store;


/**
 * All information needed about a network
 * @package PhpCoinD\Coin
 */
interface Network {
    /**
     * Create the genesis block for the network
     * @return Block
     */
    public function createGenesisBlock();

    /**
     * The client version advertised
     * @return int
     */
    public function getClientVersion();

    /**
     * The binary representation of the genesis block
     * @return string
     */
    public function getGenesisBlockHash();


    /**
     * Get the number of blocks currently stored
     * @return int
     */
    public function getHeight();


    /**
     * The magic value for packet header
     * @return int
     */
    public function getMagicValue();


    /**
     * Get the current nonce
     * @return int
     */
    public function getNonce();

    /**
     * The protocol version
     * @return int
     */
    public function getProtocolVersion();

    /**
     * @return Store
     */
    public function getStore();


    /**
     * @param Store $store
     */
    public function setStore($store);
} 
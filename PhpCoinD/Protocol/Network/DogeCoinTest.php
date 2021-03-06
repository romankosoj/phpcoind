<?php
/**
 * Copyright (c) 2014 Aurélien RICHAUD
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * Created 31/03/14 16:05 by Aurélien RICHAUD
 */

namespace PhpCoinD\Protocol\Network;

use PHPUnit_Framework_TestCase;

class DogeCoinTest extends PHPUnit_Framework_TestCase {
    /**
     * @var DogeCoin
     */
    protected $network;


    public function setUp() {
        $this->network = new DogeCoin(null, false);
    }


    /**
     * Test integrity of the genesis block
     */
    public function testGenesisBlock() {
        $genesis_block = $this->network->createGenesisBlock();
        $this->assertEquals($genesis_block->block_hash->value, $this->network->getGenesisBlockHash()->value, "Error while computing Block hash");

        // Test du hash de la transaction de base
        $this->assertEquals($genesis_block->tx[0]->getHash()->value, hex2bin('696ad20e2dd4365c7459b4a4a5af743d5e92c6da3229e6532cd605f6533f2a5b'), "Error while computing transaction hash");

        // Test the block hasher
        $genesis_block_merkle_root = $this->network->getBlockHasher()->hashBlock($genesis_block);
        $this->assertEquals($genesis_block->block_header->merkle_root->value, $genesis_block_merkle_root->value, "Error while computing Merkle Root");
    }
}
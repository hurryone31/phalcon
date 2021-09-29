<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Unit\Support\Collection\ReadOnly;

use Phalcon\Support\Collection\ReadOnly;
use UnitTester;

class HasCest
{
    /**
     * Tests Phalcon\Support\Collection\ReadOnly :: has()
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function supportCollectionHas(UnitTester $I)
    {
        $I->wantToTest('Support\Collection - has()');

        $data = [
            'one'   => 'two',
            'three' => 'four',
            'five'  => 'six',
        ];

        $collection = new ReadOnly($data);

        $I->assertTrue(
            $collection->has('three')
        );

        $I->assertTrue(
            $collection->has('THREE')
        );

        $I->assertFalse(
            $collection->has('unknown')
        );

        $I->assertTrue(
            $collection->__isset('three')
        );

        $I->assertTrue(
            isset($collection['three'])
        );

        $I->assertFalse(
            isset($collection['unknown'])
        );

        $I->assertTrue(
            $collection->offsetExists('three')
        );

        $I->assertFalse(
            $collection->offsetExists('unknown')
        );
    }

    /**
     * Tests Phalcon\Support\Collection\ReadOnly :: has() - sensitive
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function supportCollectionHasSensitive(UnitTester $I)
    {
        $I->wantToTest('Support\Collection - has()');

        $data = [
            'one'   => 'two',
            'three' => 'four',
            'five'  => 'six',
        ];

        $collection = new ReadOnly($data, false);

        $I->assertTrue(
            $collection->has('three')
        );

        $I->assertFalse(
            $collection->has('THREE')
        );

        $I->assertFalse(
            $collection->has('unknown')
        );

        $I->assertTrue(
            $collection->__isset('three')
        );

        $I->assertTrue(
            isset($collection['three'])
        );

        $I->assertFalse(
            isset($collection['unknown'])
        );

        $I->assertTrue(
            $collection->offsetExists('three')
        );

        $I->assertFalse(
            $collection->offsetExists('unknown')
        );
    }
}
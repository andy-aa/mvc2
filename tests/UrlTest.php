<?php

declare(strict_types=1);

use App\Core\URL;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    function testUrl()
    {
        $this->assertEquals(
            true,
            preg_match_all(
                URL::getInstance()->getRegExp('one/page{page}.html'),
                '/one/page45.html'
            )
        );

        $this->assertEquals(
            true,
            preg_match_all(
                URL::getInstance()->getRegExp('group/edit_form{id}.html'),
                '/group/edit_form157.html'
            )
        );

        $this->assertEquals(
            ['id' => 157],
            URL::getInstance()->getVars('group/edit_form{id}.html', '/group/edit_form157.html')
        );

        $this->assertEquals(
            ['id' => 157, 'pg' => 3],
            URL::getInstance()->getVars('group/edit_form{id}_{pg}.html', '/group/edit_form157_3.html')
        );

    }

    function testComplexUrl()
    {

        $this->assertEquals(
            ['handler' => 'TableTwo/AddRow', 'vars' => []],
            URL::getInstance()->decodeUri('/two/add')
        );

        $this->assertEquals(
            ['handler' => 'TableOne/ShowTable', 'vars' => ['page' => 56]],
            URL::getInstance()->decodeUri('/one/page56.html')
        );


    }

}
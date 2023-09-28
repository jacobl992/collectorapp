<?php
require_once "../functions.php";

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function testDateFormatGivenValidDateReturnsFormattedDate()
    {
        $expected = '24/09/2023';
        $result = formatDate('2023-09-24');
        $this->assertEquals($expected, $result);
    }

    public function testDateFormatGivenInvalidDateFormatThrowError()
    {
        $input = '20230924';
        $this->expectException(InvalidArgumentException::class);
        $result = formatDate($input);
    }

    public function testDateFormatGivenInvalidDateThrowError()
    {
        $input = '2023-13-24';
        $this->expectException(InvalidArgumentException::class);
        $result = formatDate($input);
    }

    public function testDateFormatGivenMalformedDataThrowError()
    {
        $input = [];
        $this->expectException(TypeError::class);
        $result = formatDate($input);
    }

    public function testValidDateGivenProperDateReturnTrue()
    {
        $input = '2023-09-28';
        $result = validDate($input);
        $this->assertTrue($result);
    }

    public function testValidDateGivenEmptyDateReturnFalse()
    {
        $input = '';
        $result = validDate($input);
        $this->assertFalse($result);
    }

    public function testValidDateGivenDateWithNoDashesReturnFalse()
    {
        $input = '2023/09/28';
        $result = validDate($input);
        $this->assertFalse($result);
    }

    public function testValidDateGivenImproperDateReturnFalse()
    {
        $input = '2023-13-28';
        $result = validDate($input);
        $this->assertFalse($result);
    }

    public function testValidURLGivenProperURLReturnTrue()
    {
        $input = 'https://placedog.net/200/200';
        $result = validURL($input);
        $this->assertTrue($result);
    }

    public function testValidURLGivenImproperURLReturnFalse()
    {
        $input = 'https://placedog.net/ 200/200';
        $result = validURL($input);
        $this->assertFalse($result);
    }

    public function testValidURLGivenEmptyURLReturnTrue()
    {
        $input = '';
        $result = validURL($input);
        $this->assertTrue($result);
    }
}
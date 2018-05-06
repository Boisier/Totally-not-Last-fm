<?php
declare(strict_types=1);

require_once __DIR__."/../index.php";

use PHPUnit\Framework\TestCase;

final class ExampleTests extends TestCase
{
	public function testTestsAreWorking(): void
	{
		$this->assertEquals(
			'J adore ce que tu fais',
			testExample()
		);
	}
}

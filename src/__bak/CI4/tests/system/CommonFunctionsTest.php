<?php

/**
 * @backupGlobals enabled
 */
class CommomFunctionsTest extends \CIUnitTestCase
{

	//--------------------------------------------------------------------

	public function setUp()
	{
	    unset($_ENV['foo'], $_SERVER['foo']);
	}

	//--------------------------------------------------------------------

	public function testStringifyAttributes()
	{
		$this->assertEquals(' class="foo" id="bar"', stringify_attributes(['class' => 'foo', 'id' => 'bar']));

		$atts = new stdClass;
		$atts->class = 'foo';
		$atts->id = 'bar';
		$this->assertEquals(' class="foo" id="bar"', stringify_attributes($atts));

		$atts = new stdClass;
		$this->assertEquals('', stringify_attributes($atts));

		$this->assertEquals(' class="foo" id="bar"', stringify_attributes('class="foo" id="bar"'));

		$this->assertEquals('', stringify_attributes([]));
	}

	// ------------------------------------------------------------------------

	public function testStringifyJsAttributes()
	{
		$this->assertEquals('width=800,height=600', stringify_attributes(['width' => '800', 'height' => '600'], TRUE));

		$atts = new stdClass;
		$atts->width = 800;
		$atts->height = 600;
		$this->assertEquals('width=800,height=600', stringify_attributes($atts, TRUE));
	}

	// ------------------------------------------------------------------------

    public function testEnvReturnsDefault()
    {
        $this->assertEquals('baz', env('foo', 'baz'));
    }

    public function testEnvGetsFromSERVER()
    {
        $_SERVER['foo'] = 'bar';

        $this->assertEquals('bar', env('foo', 'baz'));
    }

    public function testEnvGetsFromENV()
    {
        $_ENV['foo'] = 'bar';

        $this->assertEquals('bar', env('foo', 'baz'));
    }

	public function testRedirectReturnsRedirectResponse()
	{
		$_SERVER['REQUEST_METHOD'] = 'GET';

		$response = $this->createMock(\CodeIgniter\HTTP\Response::class);
		$routes   = new \CodeIgniter\Router\RouteCollection(new \CodeIgniter\Autoloader\MockFileLocator(new \Config\Autoload()));
		\CodeIgniter\Services::injectMock('response', $response);
		\CodeIgniter\Services::injectMock('routes', $routes);

		$routes->add('home/base', 'Controller::index', ['as' => 'base']);

		$response->method('redirect')
			->will($this->returnArgument(0));

		$this->assertInstanceOf(\CodeIgniter\HTTP\RedirectResponse::class, redirect('base'));
    }

}

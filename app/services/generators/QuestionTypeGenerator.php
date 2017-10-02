<?php
use Illuminate\Filesystem\Filesystem;

class QuestionTypeGenerator {

	/**
	 * The filesystem instance.
	 *
	 * @var \Illuminate\Filesystem\Filesystem
	 */
	protected $files;

	/**
	 * The default resource controller methods.
	 *
	 * @var array
	 */
	protected $defaults = array(
		'getTypeName',
		'getConfigForm',
	);

	/**
	 * Create a new controller generator instance.
	 *
	 * @param  \Illuminate\Filesystem\Filesystem  $files
	 * @return void
	 */
	public function __construct()
	{
		$this->files = new Filesystem;
	}

	/**
	 * Create a new resourceful controller file.
	 *
	 * @param  string  $controller
	 * @param  string  $path
	 * @param  array   $options
	 * @return void
	 */
	public function make($name, $desc)
	{
		//////// Add service file services/questions/{name}.php
		$stubService = $this->getServiceQuestionType($name, $desc);
		$servicePath = app_path().'/services/questions';
		$addService = $this->writeFile($stubService, $name, $servicePath);
		if(!$addService){
			return false;
		}

		/////// Set question display view
		$this->createQuestionType($name.'.blade', '/stubs/display.stub', '/views/site/questions');

		/////// Set question form
		$this->createQuestionType($name.'.blade', '/stubs/form.stub', '/views/site/questions_form');

		/////// Create public directory
		$this->makeDirectory(public_path().'/questions/'.$name);
		$this->makeDirectory(public_path().'/questions/'.$name.'/js');
		$this->makeDirectory(public_path().'/questions/'.$name.'/css');
		$this->makeDirectory(public_path().'/questions/'.$name.'/img');

		if ( ! $this->files->exists(public_path().'/questions/'.$name.'/js/script.js')){
			$this->files->put(public_path().'/questions/'.$name.'/js/script.js', '');
		}
		if ( ! $this->files->exists(public_path().'/questions/'.$name.'/css/style.css')){
			$this->files->put(public_path().'/questions/'.$name.'/css/style.css', '');
		}

		return true;
	}

	/**
	 * Write the completed stub to disk.
	 *
	 * @param  string  $stub
	 * @param  string  $controller
	 * @param  string  $path
	 * @return void
	 */
	protected function writeFile($stub, $name, $path)
	{
		if (str_contains($name, '\\'))
		{
			$this->makeDirectory($name, $path);
		}

		$name = str_replace('\\', DIRECTORY_SEPARATOR, $name);

		if ( ! $this->files->exists($fullPath = $path."/{$name}.php"))
		{
			return $this->files->put($fullPath, $stub);
		}
		return false;
	}

	/**
	 * Create the directory for the controller.
	 *
	 * @param  string  $controller
	 * @param  string  $path
	 * @return void
	 */
	protected function makeDirectory($path)
	{
		if ( ! $this->files->isDirectory($path) )
		{
			$this->files->makeDirectory($path, 0777, true);
		}
	}

	/**
	 * Get the controller class stub.
	 *
	 * @param  string  $controller
	 * @return string
	 */
	protected function getServiceQuestionType($name, $desc = 'No description.')
	{
		$stub = $this->files->get(__DIR__.'/stubs/questionType.stub');
		$stub =  str_replace('{{class}}', $name, $stub);
		return str_replace('{{title}}', $desc, $stub);
	}

	/**
	 * Get the controller class stub.
	 *
	 * @param  string  $controller
	 * @return string
	 */
	protected function createQuestionType($name, $stub, $path)
	{
		$stub = $this->files->get(__DIR__.$stub);
		$path = app_path().$path;
		$this->writeFile($stub, $name, $path);
	}

}

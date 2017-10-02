<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateQuestionType extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'mathplay:createquestion';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create new question type. Add new file in app/services/questions/TypeName.php, view.site.questions.TypeName.blade.php, view.site.questions_form.TypeName.blade.php. Add new directory in public/questions/TypeName with "js/script.js", "img" and "css/style.css"';

	/**
	 * The controller generator instance.
	 *
	 * @var \Mathplay\QuestionType\QuestionTypeGenerator
	 */
	protected $generator;

	/**
	 * The path to the controller directory.
	 *
	 * @var string
	 */

	/**
	 * Create a new command instance.
	 *
	 * @param  \Mathplay\QuestionType\QuestionTypeGenerator $generator
	 * @param  string  $path
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->generator = new QuestionTypeGenerator;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->generateQuestion();
		return 'hello world!';
	}

	/**
	 * Generate a new question-type system file.
	 *
	 * @return void
	 */
	protected function generateQuestion()
	{
		// Once we have the controller and resource that we are going to be generating
		// we will grab the path and options. We allow the developers to include or
		// exclude given methods from the resourceful controllers we're building.
		$questionType = $this->argument('name');
		$desc = $this->option('desc');

		// Finally, we're ready to generate the actual controller file on disk and let
		// the developer start using it. The controller will be stored in the right
		// place based on the namespace of this controller specified by commands.
		if(!$this->generator->make($questionType, $desc)){
			$this->error('Dang bai nay da ton tai!');
			return false;
		}

		$this->info('New Question-Type Service created successfully!
			
Added file: app/services/question/'.$questionType.'.php
Added file: app/views/site/questions/'.$questionType.'.blade.php
Added file: app/views/site/questions_form/'.$questionType.'.blade.php
Added directory: public/questions/'.$questionType);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('name', InputArgument::REQUIRED, 'The name of question type.'),
			array('desc', InputArgument::OPTIONAL, 'The descriptions of question type.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('name', null, InputOption::VALUE_OPTIONAL, 'The name of question type.', null),
			array('desc', null, InputOption::VALUE_REQUIRED, 'The descriptions of question type.', 'The descriptions of question type.'),
		);
	}

}

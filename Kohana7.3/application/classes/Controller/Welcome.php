<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->response->body('hello, world!');
	}

    public function action_test()
    {
        $site_config = Kohana::$config->load('test');
        $title = $site_config->get('title');
        $description = $site_config->get('description');
        $this->response->body("{$title}-{$description}");
    }
} // End Welcome

<?php

	class HTMLBuilder
	{

		protected $header, $body, $footer;

		public function __construct($header, $body, $footer)
		{
			$this->header = $header;
			$this->body = $body;
			$this->footer = $footer;

			$this->buildHeader();
			$this->buildBody();
			$this->buildFooter();
		}

		public function buildHeader()
		{
			$path = 'D:\Documents\School\3de jaar\Back End\oplossingen\css';

			$fileArray = $this->findFiles($path, 'css');

			$cssLinks = $this->buildCssLinks($fileArray);
			
			include 'D:\Documents\School\3de jaar\Back End\oplossingen\html/' . $this->header;
		}

		public function buildBody()
		{
			include 'D:\Documents\School\3de jaar\Back End\oplossingen\html/' . $this->body;
		}

		public function buildFooter()
		{
			$path = 'D:\Documents\School\3de jaar\Back End\oplossingen\js';

			$fileArray = $this->findFiles($path, 'js');

			$jsLinks = $this->buildJsLinks($fileArray);

			include 'D:\Documents\School\3de jaar\Back End\oplossingen\html/' . $this->footer;
		}

		public function findFiles($dir, $file)
		{
			return glob($dir . '/*.' . $file);
		}

		public function buildJsLinks($fileArray)
		{
			$linkArray = array();

			foreach ($fileArray as $file)
			{
				$info = pathinfo($file);
				$name = $info['basename'];

				$linkArray[] = '<script src="js/' . $name . '"></script>';
			}

			return implode('', $linkArray);
		}

		public function buildCssLinks($fileArray)
		{
			$linkArray = array();

			foreach ($fileArray as $file)
			{
				$info = pathinfo($file);
				$name = $info['basename'];

				$linkArray[] = '<link rel="stylesheet" type="text/css" href="css/' . $name . '">';
			}

			return implode('', $linkArray);
		}
	}

?>
<?php

	class Percent
	{

		public $relative, $hundred, $nominal;

		public function __construct($new, $unit)
		{
			$this->relative = $new/$unit;
			$this->hundred = $this->relative * 100;
			
			if ($this->relative > 1)
			{
				$this->nominal = 'positive';
			}
			elseif ($this->relative == 0)
			{
				$this->nominal = 'status-quo';
			}
			elseif ($this->relative < 1)
			{
				$this->nominal = 'negative';
			}
		}

		public function formatNumber($number)
		{
			return number_format($number, 2);
		}
	}

?>
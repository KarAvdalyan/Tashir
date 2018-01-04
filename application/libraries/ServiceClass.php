<?php
class ServiceClass
{
	public function GetAutoCompleteList ($result)
	{

		$output = '<ul class = "list-unstyled">';

		if ($result->num_rows() > 0)
	        {
	            foreach ($result->result() as $row)
	            {
	                    $output.='<li id ="'.$row->id.'">'.$row->name.'</li>';
	            }
	        }
	        else
	        {
	            $output='<li> not found</li>';
	        }

	        $output.='</ul>';
	        return $output;
	}	
}


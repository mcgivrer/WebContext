<?php
interface IManager{
        /**
     * Pre load/process data to process during treatment.
     */
	public function preProcess();

    /**
     * Rendered template.
     * @param $template name of the template to render.
     */
	public function renderTemplate();
}
?>


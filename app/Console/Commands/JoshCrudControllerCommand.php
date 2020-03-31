<?php namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class JoshCrudControllerCommand extends GeneratorCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'crud:controller';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new resource controller class';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Controller';

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return __DIR__.'/stubs/controller.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace.'\Http\Controllers';
	}
	
    /**
     * Build the model class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
       // $name = ucwords(strtolower($this->argument('name')));
        $stub = $this->files->get($this->getStub());
        $one=strtolower($this->argument('name'));
        $two = substr(strtolower($this->argument('name')),-10);
        $crudName=chop($one,$two);
		$crudNameCap = ucwords($crudName);
		$crudNamePlural = str_plural($crudName);
		$crudNamePluralCap = str_plural($crudNameCap);
        $crudNameSingular = str_singular($crudName);
        $crudNameSingularCap = str_singular($crudNameCap);

        //file upload for store method
        $data = array();
        $x = 0;
        $fileUploads =  '';
        $schema = $this->option('fields');
        $fields = explode(',', $schema);
        foreach ($fields as $field) {
            $array = explode(':', $field);
            $data[$x]['type'] = trim($array[0]);
            $data[$x]['name'] = trim($array[1]);
            $x++;
        }

        $schemaFields = ''; $exceptFields=[];$checkbox_name='';
        foreach ($data as $item) {
            if ($item['type'] == 'file') {
                $name_item = $item['name'];
                $name_image = $name_item."_image";
                $exceptFields[] = $name_image;
                $fileUploads .= "
                if (\$request->hasFile('$name_image')) {
        			\$file            = \$request->file('$name_image');
        			\$destinationPath =  public_path().'/uploads/crudfiles/';
        			\$filename        = str_random(20) .'.' . \$file->getClientOriginalExtension() ?: 'png';
        			\$$crudNameSingular->$name_item = \$filename;
        			if (\$request->hasFile('$name_image')) {
						\$request->file('$name_image')->move(\$destinationPath, \$filename);
					}
        		}
";

            }

                if ($item['type'] == 'checkbox') {
                    $checkboxName = $item['name'];
                    $checked_value=1;$unchecked_value=0;
                    $checkbox_name .= "
                        if(\$request->has('$checkboxName')){
	                    \$$crudNameSingular->$checkboxName=$checked_value;
	                    }
                        else{
                         $$crudNameSingular->$checkboxName=$unchecked_value;
                         }";
                }

        }

        $sampleArray=implode("','",$exceptFields);

        return $this->replaceNamespace($stub, $name)
            ->replaceFileUploads($stub, $fileUploads)
            ->replaceExceptFields($stub, $sampleArray)
            ->replaceCheckBoxNames($stub, $checkbox_name)
            ->replaceCrudName($stub, $crudName)
            ->replaceCrudNameCap($stub, $crudNameCap)
            ->replaceCrudNamePlural($stub, $crudNamePlural)
            ->replaceCrudNamePluralCap($stub, $crudNamePluralCap)
            ->replaceCrudNameSingular($stub, $crudNameSingular)
            ->replaceCrudNameSingularCap($stub, $crudNameSingularCap)
            ->replaceClass($stub, $name);

    }

    protected function replaceFileUploads(&$stub, $fileUploads)
    {
        $stub = str_replace(
            '{{fileUploads}}', $fileUploads, $stub
        );

        return $this;
    }

    /**
     * Replace the crudName for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceCrudName(&$stub, $crudName)
    {
        $stub = str_replace(
            '{{crudName}}', $crudName, $stub
        );

        return $this;
    }

    /**
     * Replace the crudName for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceExceptFields(&$stub, $exceptFields)
    {
        $stub = str_replace(
            '{{exceptFields}}', $exceptFields, $stub
        );

        return $this;
    }

    protected function replaceCheckBoxNames(&$stub, $checkbox_name)
    {
        $stub = str_replace(
            '{{checkbox_name}}', $checkbox_name, $stub
        );

        return $this;
    }

    /**
     * Replace the crudNameCap for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceCrudNameCap(&$stub, $crudNameCap)
    {
        $stub = str_replace(
            '{{crudNameCap}}', $crudNameCap, $stub
        );

        return $this;
    }

    /**
     * Replace the crudNamePlural for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceCrudNamePlural(&$stub, $crudNamePlural)
    {
        $stub = str_replace(
            '{{crudNamePlural}}', $crudNamePlural, $stub
        );

        return $this;
    }    

    /**
     * Replace the crudNamePluralCap for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceCrudNamePluralCap(&$stub, $crudNamePluralCap)
    {
        $stub = str_replace(
            '{{crudNamePluralCap}}', $crudNamePluralCap, $stub
        );

        return $this;
    }   

    /**
     * Replace the crudNameSingular for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceCrudNameSingular(&$stub, $crudNameSingular)
    {
        $stub = str_replace(
            '{{crudNameSingular}}', $crudNameSingular, $stub
        );

        return $this;
    }

    /**
     * Replace the crudNameSingularCap for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceCrudNameSingularCap(&$stub, $crudNameSingularCap)
    {
        $stub = str_replace(
            '{{crudNameSingularCap}}', $crudNameSingularCap, $stub
        );

        return $this;
    }

     /**
     * Get the console command options.
     *
     * @return array
     */
    /*protected function getOptions()
    {
        return [
            ['crud-name', null, InputOption::VALUE_REQUIRED, 'The crud name.', null]
        ];
    }*/

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name of the Crud.'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['fields', null, InputOption::VALUE_REQUIRED, 'Fields of form & model.', null],
        ];
    }

}

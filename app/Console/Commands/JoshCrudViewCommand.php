<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Log;

class JoshCrudViewCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create view files for crud operation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $crudName = strtolower($this->argument('name'));        
        $crudNameCap = ucwords($crudName);
        $crudNameSingular = str_singular($crudName);
        $crudNamePlural = str_plural($crudName);
        $crudNamePluralCap = ucwords($crudNamePlural);
        $viewDirectory = $this->laravel['path'].'/../resources/views/';        
        $path = $viewDirectory.'admin/'.$crudNamePlural.'/';
        if(!is_dir($path)) {
            mkdir($path);   
        } 

        $fields = $this->option('fields');
        $fieldsArray = explode(',', $fields);        

        $data = array();
        $x = 0;
        foreach ($fieldsArray as $item) {
            $array = explode(':', $item);
            $data[$x]['type'] = trim($array[0]);

            $data[$x]['name'] = trim($array[1]);
            if($data[$x]['type']=='radio'){
                    $newArray1=explode('|',$data[$x]['name']);
                    $data[$x]['field'] = trim($newArray1[0]);
                    $data[$x]['names'] = array_slice($newArray1,1,count($newArray1));
            }
            elseif($data[$x]['type']=='select2'){
                $newArray2=explode('|',$data[$x]['name']);
                $data[$x]['field'] = trim($newArray2[0]);
                $data[$x]['names'] = array_slice($newArray2,1,count($newArray2));
            }

            $x++;
        }
        $formFields = '';
        $editFormFields = '';
        $showContents = '';
        foreach ($data as $item) {
            if($item['type']=='radio'){
                $label = ucwords(strtolower(str_replace('_', ' ', $item['field'])));
                $tableHeads[] = '<th>' . ucwords($label) . '</th>';
            }
            else
            {
                $label = ucwords(strtolower(str_replace('_', ' ', $item['name'])));
                $tableHeads[] = '<th>' . ucwords($label) . '</th>';
            }

            if($item['type']=='radio'){
                    $tableData[] = '<td>{!! $' . $crudNameSingular . '->' . $item['field'] . ' !!}</td>';
            } elseif($item['type']=='checkbox'){
                    $tableData[] = '<td>@if( $' . $crudNameSingular . '->' . $item['name'] .'==0)'.'<i class="fa fa-times"></i>@else<i class="fa fa-check"></i>@endif</td>';
            }
            elseif($item['type']=='file'){
                $tableData[] = '<td><img src="{{URL::to(\'uploads/crudfiles/\'.$' . $crudNameSingular . '[\'' . $item['name'] . '\'])}}" style="width: 30px; height: 30px;" alt="Image"></td>';
            }
            else {
                $tableData[] = '<td>{!! $' . $crudNameSingular . '->' . $item['name'] . ' !!}</td>';
           }

            if($item['type']=='radio') {
                $showContents .= '<tr><td>' . $item['field'] . '</td><td>';
                    $showContents .= '{{ $' . $crudNameSingular . '[\'' . $item['field'] . '\'] }}</td></tr>';
            }
            elseif($item['type']=='checkbox'){
                $showContents .= '<tr><td>' . $item['name'] . '</td><td>@if( $' . $crudNameSingular . '->' . $item['name'] .'==0)'.'<i class="fa fa-times"></i>@else<i class="fa fa-check"></i>@endif</td>';
            }

            elseif($item['type']=='file'){

                $showContents .= '<tr><td>' . $item['name'] . '</td><td><img src="{{URL::to(\'uploads/crudfiles/\'.$' . $crudNameSingular . '[\'' . $item['name'] . '\'])}}" class="img-responsive" alt="Image"></td></tr>';
            }
            else{
                $showContents .= '<tr><td>' . $item['name'] . '</td><td>{{ $' . $crudNameSingular . '[\'' . $item['name'] . '\'] }}</td></tr>';
            }
            $showContents .= "\n\t\t\t\t\t";

            if( $item['type']=='string' ) {
                $formFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::text('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            }
            elseif( $item['type']=='radio' ) {
                $formFields .="{!!Form::label('".$item['field'].":')!!}";
                foreach ($item['names'] as $value) {
                    $formFields .= "&nbsp;&nbsp;&nbsp;\t\t\t\t{!! Form::radio('".$item['field']."','".$value."') !!} ".$value."\t\t\t\t";
                }
            }
            elseif( $item['type']=='checkbox' ) {
                $formFields .=
                    "<div class=\"form-group\">
                        {!! \n\n\t\t\t\t\t Form::label('".$item['name']."', '".$label.": ') !!}
                        &nbsp;&nbsp;&nbsp;{!! Form::checkbox('".$item['name']."','1', false) !!}&nbsp;&nbsp;&nbsp;".$item['name']."
                    </div>";
            }

            elseif( $item['type']=='file' ) {
                $formFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        &nbsp; {!! Form::file('".$item['name']."_image', ['class' => 'form-control']) !!}

                    </div>";
            }

            elseif( $item['type']=='text' ) {
                $formFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::textarea('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            } elseif( $item['type']=='password' ) {
                $formFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::password('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            } elseif( $item['type']=='email' ) {
                $formFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::email('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            } else {
                $formFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::text('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            }
            $formFields .= "\n\n\t\t\t\t\t";


            if( $item['type']=='string' ) {
                $editFormFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::text('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            }
            elseif( $item['type']=='radio' ) {
                $editFormFields .="{!!Form::label('".$item['field'].":')!!}";
                foreach ($item['names'] as $value) {
                    $editFormFields .= "&nbsp;&nbsp;&nbsp;\t\t\t\t{!! Form::radio('".$item['field']."','".$value."') !!} ".$value."\t\t\t\t";
                }
            }
            elseif( $item['type']=='checkbox' ) {
                $editFormFields .=
                    "<div class=\"form-group\">
                        {!! \n\n\t\t\t\t\t Form::label('".$item['name']."', '".$label.": ') !!}
                        &nbsp;&nbsp;&nbsp;{!! Form::checkbox('".$item['name']."','1', false) !!}&nbsp;&nbsp;&nbsp;".$item['name']."
                    </div>";
            }

            elseif( $item['type']=='file' ) {
                $editFormFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        <div>
                       
                        <img src=\"{{URL::to('uploads/crudfiles/'.$".$crudName."['".$item['name']."'])}}\" style=\"height: 100px;width: 100px;\" alt=\"Image\">
                        </div>
                        &nbsp; {!! Form::file('".$item['name']."_image', ['class' => 'form-control']) !!}

                    </div>";
            }

            elseif( $item['type']=='text' ) {
                $editFormFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::textarea('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            } elseif( $item['type']=='password' ) {
                $editFormFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::password('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            } elseif( $item['type']=='email' ) {
                $editFormFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::email('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            } else {
                $editFormFields .=
                    "<div class=\"form-group\">
                        {!! Form::label('".$item['name']."', '".$label.": ') !!}
                        {!! Form::text('".$item['name']."', null, ['class' => 'form-control']) !!}
                    </div>";
            }
            $editFormFields .= "\n\n\t\t\t\t\t";
        }

        // For index.blade.php file
        $indexFile = __DIR__.'/stubs/index.blade.stub';
        $newIndexFile = $path.'index.blade.php';
        if (!copy($indexFile, $newIndexFile)) {
            echo "failed to copy $indexFile...\n";
        } else {
            file_put_contents($newIndexFile,str_replace('%%crudName%%',$crudName,file_get_contents($newIndexFile)));
            file_put_contents($newIndexFile,str_replace('%%crudNameCap%%',$crudNameCap,file_get_contents($newIndexFile)));
            file_put_contents($newIndexFile,str_replace('%%crudNameSingular%%',$crudNameSingular,file_get_contents($newIndexFile)));
            file_put_contents($newIndexFile,str_replace('%%crudNamePlural%%',$crudNamePlural,file_get_contents($newIndexFile)));
            file_put_contents($newIndexFile,str_replace('%%crudNamePluralCap%%',$crudNamePluralCap,file_get_contents($newIndexFile)));
            file_put_contents($newIndexFile,str_replace('%%tableHeads%%',implode("\n\t\t\t\t\t\t\t",$tableHeads),file_get_contents($newIndexFile)));
            file_put_contents($newIndexFile,str_replace('%%tableData%%',implode("\n\t\t\t\t\t\t\t",$tableData),file_get_contents($newIndexFile)));
        }

        // For create.blade.php file
        $createFile = __DIR__.'/stubs/create.blade.stub';
        $newCreateFile = $path.'create.blade.php';
        if (!copy($createFile, $newCreateFile)) {
            echo "failed to copy $createFile...\n";
        } else {
            file_put_contents($newCreateFile,str_replace('%%crudName%%',$crudName,file_get_contents($newCreateFile)));
            file_put_contents($newCreateFile,str_replace('%%crudNameCap%%',$crudNameCap,file_get_contents($newCreateFile)));
            file_put_contents($newCreateFile,str_replace('%%crudNameSingular%%',$crudNameSingular,file_get_contents($newCreateFile)));
            file_put_contents($newCreateFile,str_replace('%%crudNamePlural%%',$crudNamePlural,file_get_contents($newCreateFile)));
            file_put_contents($newCreateFile,str_replace('%%crudNamePluralCap%%',$crudNamePluralCap,file_get_contents($newCreateFile)));
            file_put_contents($newCreateFile,str_replace('%%formFields%%',$formFields,file_get_contents($newCreateFile)));
        }

        // For edit.blade.php file
        $editFile = __DIR__.'/stubs/edit.blade.stub';
        $newEditFile = $path.'edit.blade.php';
        if (!copy($editFile, $newEditFile)) {
            echo "failed to copy $editFile...\n";
        } else {
            file_put_contents($newEditFile,str_replace('%%crudName%%',$crudName,file_get_contents($newEditFile)));
            file_put_contents($newEditFile,str_replace('%%crudNameCap%%',$crudNameCap,file_get_contents($newEditFile)));
            file_put_contents($newEditFile,str_replace('%%crudNameSingular%%',$crudNameSingular,file_get_contents($newEditFile)));
            file_put_contents($newEditFile,str_replace('%%crudNamePlural%%',$crudNamePlural,file_get_contents($newEditFile)));
            file_put_contents($newEditFile,str_replace('%%crudNamePluralCap%%',$crudNamePluralCap,file_get_contents($newEditFile)));
            file_put_contents($newEditFile,str_replace('%%formFields%%',$editFormFields,file_get_contents($newEditFile)));
        }        

        // For show.blade.php file
        $showFile = __DIR__.'/stubs/show.blade.stub';
        $newShowFile = $path.'show.blade.php';
        if (!copy($showFile, $newShowFile)) {
            echo "failed to copy $showFile...\n";
        } else {
            file_put_contents($newShowFile,str_replace('%%crudName%%',$crudName,file_get_contents($newShowFile)));
            file_put_contents($newShowFile,str_replace('%%crudNameCap%%',$crudNameCap,file_get_contents($newShowFile)));
            file_put_contents($newShowFile,str_replace('%%crudNameSingular%%',$crudNameSingular,file_get_contents($newShowFile)));
            file_put_contents($newShowFile,str_replace('%%crudNamePlural%%',$crudNamePlural,file_get_contents($newShowFile)));
            file_put_contents($newShowFile,str_replace('%%crudNamePluralCap%%',$crudNamePluralCap,file_get_contents($newShowFile)));
            file_put_contents($newShowFile,str_replace('%%showContents%%',$showContents,file_get_contents($newShowFile)));
        }  

        $this->info('Views created successfully.');

    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name of the Crud.'],
        ];
    }

    /*
     * Get the console command options.
     *
     * @return array
     */
     
    protected function getOptions()
    {
        return [
            ['fields', null, InputOption::VALUE_OPTIONAL, 'The fields of the form.', null],
        ];
    }

}

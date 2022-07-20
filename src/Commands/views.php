$create = '@extends(\'layouts.app\')
        @section(\'content\')
            <div class="container">
                <div class="row">
                    @include(\'admin.sidebar\')
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">Create new '.ucfirst($folder).'</div> 
                            <div class="card-body">
                                <a href="{{ url(\'/'.$folders.'\') }}" ><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <br />
                                <br />
                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form method="POST" action="{{ url(\'/'.$folders.'\') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    @include (\''.$folders.'.form\', [\'formMode\' => \'create\'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection';

        $edit = '@extends(\'layouts.app\')

        @section(\'content\')
            <div class="container">
                <div class="row">
                    @include(\'admin.sidebar\')
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">Edit '.ucfirst($folder).' {{ $'.$folder.'->id }}</div>
                            <div class="card-body">
                                <a href="{{ url(\'/'.$folders.'\') }}" ><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <br />
                                <br />
                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form method="POST" action="{{ url(\'/'.$folders.'/\' . $'.$folder.'->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ method_field(\'PATCH\') }}
                                    {{ csrf_field() }}
                                    @include (\''.$folders.'.form\', [\'formMode\' => \'edit\'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection';

        $form = '<div class="form-group {{ $errors->has(\''.$field0.'\') ? \'has-error\' : \'\'}}">
        <div class="form-group">
            <label class="control-label">{{ \''.ucfirst($field0).'\' }}</label>
            <input class="form-control" name="'.$field0.'" type="text" value="{{ isset($'.$folder.'->'.$field0.') ? $'.$folder.'->'.$field0.' : \'\'}}" >
            {!! $errors->first(\''.$field0.'\', \'<p class="help-block">:message</p>\') !!}

            <label class="control-label">{{ \''.ucfirst($field1).'\' }}</label>
            <input class="form-control" name="'.$field1.'" type="text" value="{{ isset($'.$folder.'->'.$field1.') ? $'.$folder.'->'.$field1.' : \'\'}}" >
            {!! $errors->first(\''.$field1.'\', \'<p class="help-block">:message</p>\') !!}

        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="{{ $formMode === \'edit\' ? \'Update\' : \'Create\' }}">
        </div>';

        $index = '@extends(\'layouts.app\')
        @section(\'content\')
            <div class="container">
                <div class="row">
                    @include(\'admin.sidebar\')
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">'.ucfirst($folders).'</div>
                            <div class="card-body">
                                <a href="{{ url(\'/'.$folders.'/create\') }}" class="btn btn-success btn-sm" title="Add '.ucfirst($folders).'">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add new
                                </a>
                                @if ($message = Session::get(\'flash_message\'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <br/>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>'.ucfirst($field0).'</th>
                                                <th>'.ucfirst($field1).'</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($'.$folders.' as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->'.$field0.' }}</td>
                                                <td>{{ $item->'.$field1.' }}</td>
                                                <td>
                                                    <a href="{{ url(\'/'.$folders.'/\' . $item->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Show</button></a>
                                                    <a href="{{ url(\'/'.$folders.'/\' . $item->id . \'/edit\') }}" title="Edit '.ucfirst($folders).'"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                    <form method="POST" action="{{ url(\'/'.$folders.'\' . \'/\' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field(\'DELETE\') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection';

        $show = '@extends(\'layouts.app\')
        @section(\'content\')
            <div class="container">
                <div class="row">
                    @include(\'admin.sidebar\')
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">'.ucfirst($folders).' {{ $'.$folder.'->id }}</div>
                            <div class="card-body">
                                <a href="{{ url(\'/'.$folders.'\') }}" ><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <a href="{{ url(\'/'.$folders.'/\' . $'.$folder.'->id . \'/edit\') }}" title="Editar '.ucfirst($folder).'"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <form method="POST" action="{{ url(\''.$folders.'\' . \'/\' . $'.$folder.'->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field(\'DELETE\') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir '.ucfirst($folder).'" onclick="return confirm(&quot;Confirma a exclusão?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                                <br/>
                                <br/>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>ID</th><td>{{ $'.$folder.'->id }}</td>
                                            </tr>
                                            <tr><th> '.ucfirst($field0).' </th><td> {{ $'.$folder.'->'.$field0.' }} </td></tr><tr><th> '.ucfirst($field1).' </th><td> {{ $'.$folder.'->'.$field1.' }} </td></tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection';

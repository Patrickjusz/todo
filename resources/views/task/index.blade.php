@extends('layouts.app')

@section('content')
    <div class="margin-wrapper">
        <div class="col-sm-12 tasks">
            <div class="task-list">
                <div class="row">
                    <div class="col-8">
                        <h1>Todo <button class="btn rounded btn-success "
                                style="border-radius: 50%; background-color: #4dbd74; border-color: #4dbd74;">Add</button>
                        </h1>
                    </div>

                    <div class="col-4">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div id="render-tasks-wrapper">
                    {{--  --}}
                </div>

                <div class="clearfix"></div>
            </div>
            
            <button id="btn-reload" class="btn-sm btn-primary mt-3 float-right">Reload</button>
            <button class="btn-sm btn-primary mt-3 float-right">Show ended tasks</button>
        </div>
    </div>
@endsection

@section('js')
    const API_KEY = "{{ env('API_KEY') }}";

    //Handlebars templates
    var handlebarsTemplateItem = Handlebars.compile(
    '@include('task.handlebars-template.item')'
    );

    var handlebarsTemplatePriorityBadge = Handlebars.compile(
    '@include('task.handlebars-template.badge')'
    );
    //------------------
@endsection

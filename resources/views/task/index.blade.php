@extends('layouts.app')

@section('content')
    <div class="margin-wrapper animate__animated animate__fadeIn">
        <div class="col-sm-12 tasks">
            <div class="task-list">
                <div class="row">
                    <div class="col-8">
                        <h1 class="logo"><a href="{{ route('task.index') }}">Todo</a> <button id="btn-add"
                                class="btn rounded btn-success ">Add</button>
                        </h1>
                    </div>

                    <div class="col-4">
                        <div class="input-group rounded">
                            <input id="search-input" type="search" class="form-control rounded" placeholder="Search"
                                aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div id="render-tasks-wrapper" class="animate__animated animate__fadeIn">
                    {{--  --}}
                </div>

                <div class="clearfix"></div>
            </div>

            <button id="btn-clear" class="btn-sm btn-primary mt-3 float-right">Clear done tasks</button>
        </div>
    </div>


    @include('task.edit_modal')
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
